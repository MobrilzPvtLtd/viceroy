<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;



class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countrys = Country::all();
        return view('backend.country.index', compact('countrys'));
    }

    public function create()
    {
        return view('backend.country.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'co_name' => 'required',
        ]);

        Country::create($request->post());

        return redirect()->route('country.index')->with('success', 'Country has been created successfully.');
    }
    public function show()
    {

    }

    public function edit(Country $country)
    {
        return view('backend.country.edit', compact('country'));
    }

    public function update(Request $request, Country  $country)
    {
        $request->validate([
            'co_name' => 'required',
        ]);

        $country->fill($request->post())->save();

        return redirect()->route('country.index');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return redirect()->route('country.index');
    }
}
