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
        // $citys = City::with('country', 'state')->get();

        $citys = City::join('countries', 'countries.id', '=', 'cities.co_name')
                ->join('states', 'states.id', '=', 'cities.st_name')
                ->select('cities.*', 'states.st_name', 'countries.co_name')
                ->get();
        return view('backend.city.index', compact('citys'));
    }


    public function create()
    {
        $country = Country::all();
        $state = State::all();
        return view('backend.city.create',compact('country','state'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'co_name' => 'required',
            'st_name' => 'required',
            'ct_name' => 'required',
        ]);

        City::create($request->post());
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
        $request->validate([
            'co_name' => 'required',
            'st_name' => 'required',
            'ct_name' => 'required',

        ]);

        $city->fill($request->post())->save();

        return redirect()->route('city.index');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('city.index');
    }
}
