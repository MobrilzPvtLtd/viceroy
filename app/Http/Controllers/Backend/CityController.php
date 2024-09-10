<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Carbon\Carbon;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::join('countries', 'countries.id', '=', 'cities.co_name')
                ->join('states', 'states.id', '=', 'cities.st_name')
                ->whereNull('cities.deleted_at')
                ->select('cities.*', 'states.st_name', 'countries.co_name')
                ->get();
        return view('backend.city.index', compact('cities'));
    }


    public function create()
    {
        $countries = Country::whereNull('deleted_at')->get();
        $state = State::whereNull('deleted_at')->get();
        return view('backend.city.create',compact('countries','state'));
    }

    public function store(Request $request)
    {
        $city = new City();
        $city->co_name = $request->co_name;
        $city->st_name = $request->st_name;
        $city->ct_name = $request->ct_name;
        // $city->address = $request->address;
        $city->save();

        return redirect()->route('city.index')->with('success', 'Country has been created successfully.');
    }
    public function show()
    {

    }

    public function fetchState(Request $request){
        $options = "";
        $state = State::whereNull('deleted_at')->where('co_name', $request->country)->get();
        foreach($state as $sta){
            $options .="<option value=".$sta->id.">".$sta->st_name."</option>";
        }
        return response()->json($options);
    }

    public function edit(Request $request, City $city)
    {
        // dd($city);
        $country = Country::whereNull('deleted_at')->get();
        $state = State::whereNull('deleted_at')->get();
        return view('backend.city.edit', compact('city','country','state'));
    }

    public function update(Request $request, City  $city)
    {
        $city = City::find($city->id);
        $city->co_name = $request->co_name;
        $city->st_name = $request->st_name;
        $city->ct_name = $request->ct_name;
        // $city->address = $request->address;
        $city->save();

        return redirect()->route('city.index');
    }

    public function cityTrash() {
        $cities = City::join('countries', 'countries.id', '=', 'cities.co_name')
                ->join('states', 'states.id', '=', 'cities.st_name')
                ->select('cities.*', 'states.st_name', 'countries.co_name')
                ->orderBy('deleted_at', 'desc')
                ->onlyTrashed()->get();

        return view("backend.city.trash", compact('cities'));
    }

    public function destroy($id)
    {
        $city = City::find($id);
        if ($city) {
            $city->deleted_at = Carbon::now();
            $city->save();
        }
        return redirect()->route('city.index')->with('success', 'City successfully deleted!');
    }

    public function cityRestore($id)
    {
        $city = City::withTrashed()->find($id);

        if ($city && $city->trashed()) {
            $city->restore();
            return redirect()->route('city-trash')->with('success', 'City successfully restored!');
        }

        return redirect()->route('city-trash')->with('error', 'City not found or already restored.');
    }

    public function cityDelete($id)
    {
        $city = City::withTrashed()->find($id);

        if ($city) {
            $city->forceDelete();

            return redirect()->route('city-trash')->with('success', 'City successfully permanently deleted!');
        }

        return redirect()->route('city-trash')->with('error', 'City not found.');
    }
}
