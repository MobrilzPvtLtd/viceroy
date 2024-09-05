<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use Carbon\Carbon;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countrys = Country::where('deleted_at', null)->get();
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

    public function countryTrash() {
        $countries = Country::where('deleted_at', '!=', null)->orderBy('deleted_at', 'desc')->get();

        return view("backend.country.trash", compact('countries'));
    }

    public function destroy($id)
    {
        $country = Country::find($id);
        if ($country) {
            $country->deleted_at = Carbon::now();
            $country->save();
        }
        return redirect()->route('country.index')->with('success', 'Country successfully deleted!');
    }

    public function countryRestore($id)
    {
        $country = Country::find($id);
        if ($country) {
            $country->deleted_at = null;
            $country->save();
        }
        return redirect()->route('country-trash')->with('success', 'Country successfully restored!');
    }

    public function countryDelete($id)
    {
        $country = Country::find($id);
        $country->delete();
        return redirect()->route('country-trash')->with('success', 'Country successfully permanently deleted!');
    }
}
