<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\State;

class CityController extends Controller
{
    public function index()
    {
        $citys = City::join('countries', 'countries.id', '=', 'cities.co_name')
                ->join('states', 'states.id', '=', 'cities.st_name')
                ->select('cities.*', 'states.st_name', 'countries.co_name')
                ->get();
        return view('backend.city.index', compact('citys'));
    }


    public function create()
    {
        $countries = Country::all();
        $state = State::all();
        return view('backend.city.create',compact('countries','state'));
    }

    public function store(Request $request)
    {
        $city = new City();
        $city->co_name = $request->co_name;
        $city->st_name = $request->st_name;
        $city->ct_name = $request->ct_name;
        $city->address = $request->address;
        $city->save();

        return redirect()->route('city.index')->with('success', 'Country has been created successfully.');
    }
    public function show()
    {

    }

    public function fetchState(Request $request){
        $options = "";
        $state = State::where('co_name', $request->country)->get();
        foreach($state as $sta){
            $options .="<option value=".$sta->id.">".$sta->st_name."</option>";
        }
        return response()->json($options);
    }

    public function edit(Request $request, City $city)
    {
        // dd($city);
        $country = Country::all();
        $state = State::all();
        return view('backend.city.edit', compact('city','country','state'));
    }

    public function update(Request $request, City  $city)
    {
        $city = City::find($city->id);
        $city->co_name = $request->co_name;
        $city->st_name = $request->st_name;
        $city->ct_name = $request->ct_name;
        $city->address = $request->address;
        $city->save();

        return redirect()->route('city.index');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('city.index');
    }
}
