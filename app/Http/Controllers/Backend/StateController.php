<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;

class StateController extends Controller
{
    public function index()
    {
        $states = State::join('countries', 'countries.id', '=', 'states.co_name')
        ->select('states.*', 'countries.co_name as country_name')
        ->get();
        return view('backend.state.index', compact('states'));
    }
    public function create()
    {
        $country = Country::all();
        return view('backend.state.create', compact('country'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'co_name' => 'required',
            'st_name' => 'required',
        ]);

        State::create($request->post());

        return redirect()->route('state.index')->with('success', 'Country has been created successfully.');
    }
    public function show() {}

    public function edit(State $state)
    {
        return view('backend.state.edit', compact('state'));
    }

    public function update(Request $request, State  $state)
    {
        $request->validate([
            'co_name' => 'required',
            'st_name' => 'required',
        ]);

        $state->fill($request->post())->save();

        return redirect()->route('state.index');
    }

    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('state.index');
    }
}
