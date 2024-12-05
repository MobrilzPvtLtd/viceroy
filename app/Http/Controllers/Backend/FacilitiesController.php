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
        $facilitiesy = Facilities::whereNull('deleted_at')->get();
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
        $facilities = Facilities::onlyTrashed()->get();

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
        $facility = Facilities::withTrashed()->find($id);

        if ($facility && $facility->trashed()) {
            $facility->restore();
            return redirect()->route('facility-trash')->with('success', 'Facilities successfully restored!');
        }

        return redirect()->route('facility-trash')->with('error', 'Facilities not found or already restored.');
    }

    public function facilityDelete($id)
    {
        $facility = Facilities::withTrashed()->find($id);

        if ($facility) {
            $facility->forceDelete();

            return redirect()->route('facility-trash')->with('success', 'Facilities successfully permanently deleted!');
        }

        return redirect()->route('facility-trash')->with('error', 'Facilities not found.');
    }
}


