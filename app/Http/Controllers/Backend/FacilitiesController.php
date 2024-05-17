<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facilities;

class FacilitiesController extends Controller
{
    public function index()
    {
        $facilitiesy = Facilities::all();
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

    public function destroy(Facilities $facility)
    {
        $facility->delete();
        return redirect()->route('facility.index');
    }
}


