<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;
use Carbon\Carbon;

class FacilitiesController extends Controller
{
    public function index()
    {
        $facilitiesy = Facilities::where('deleted_at', null)->get();
        return view('backend.facility.index',compact('facilitiesy'));
    }

    public function create()
    {
        return view('backend.facility.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Facilities::create($request->post());

        return redirect()->route('facility.index')->with('success', 'facilities has been created successfully.');
    }
    public function show()
    {

    }

    public function edit(Facilities $facility)
    {
        return view('backend.facility.edit', compact('facility'));
    }

    public function update(Request $request, Facilities  $facility)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $facility->fill($request->post())->save();

        return redirect()->route('facility.index');
    }

    public function facilityTrash() {
        $facilities = Facilities::where('deleted_at', '!=', null)->orderBy('deleted_at', 'desc')->paginate();

        return view("backend.facility.trash", compact('facilities'));
    }

    public function destroy($id)
    {
        $facility = Facilities::find($id);
        if ($facility) {
            $facility->deleted_at = Carbon::now();
            $facility->save();
        }
        return redirect()->route('facility.index')->with('success', 'Facilities successfully deleted!');
    }

    public function facilityRestore($id)
    {
        $facility = Facilities::find($id);
        if ($facility) {
            $facility->deleted_at = null;
            $facility->save();
        }
        return redirect()->route('facility-trash')->with('success', 'Facilities successfully restored!');
    }

    public function facilityDelete($id)
    {
        $facility = Facilities::find($id);

        $facility->delete();

        return redirect()->route('facility-trash')->with('success', 'Facilities successfully permanently deleted!');
    }
}


