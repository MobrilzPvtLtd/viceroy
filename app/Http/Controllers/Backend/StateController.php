<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;
use Carbon\Carbon;

class StateController extends Controller
{
    public function index()
    {
        $states = State::join('countries', 'countries.id', '=', 'states.co_name')
            ->whereNull('states.deleted_at')
            ->select('states.*', 'countries.co_name as country_name')
            ->get();
        return view('backend.state.index', compact('states'));
    }
    public function create()
    {
        $countries = Country::whereNull('deleted_at')->get();
        return view('backend.state.create', compact('countries'));
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

    public function show() {

    }

    public function edit(State $state)
    {
        $countries = Country::whereNull('deleted_at')->get();
        return view('backend.state.edit', compact('state','countries'));
    }

    public function update(Request $request, State  $state)
    {
        $request->validate([
            'co_name' => 'required',
            'st_name' => 'required',
        ]);

        $state->fill($request->post())->save();

        return redirect()->route('state.index')->with('success', 'Country has been updated successfully.');
    }

    public function stateTrash() {
        $states = State::join('countries', 'countries.id', '=', 'states.co_name')
                ->select('states.*', 'countries.co_name as country_name')
                ->orderBy('deleted_at', 'desc')
                ->onlyTrashed()->get();

        return view("backend.state.trash", compact('states'));
    }

    public function destroy($id)
    {
        $state = State::find($id);
        if ($state) {
            $state->deleted_at = Carbon::now();
            $state->save();
        }
        return redirect()->route('state.index')->with('success', 'State successfully deleted!');
    }

    public function stateRestore($id)
    {
        $state = State::withTrashed()->find($id);

        if ($state && $state->trashed()) {
            $state->restore();
            return redirect()->route('state-trash')->with('success', 'State successfully restored!');
        }

        return redirect()->route('state-trash')->with('error', 'State not found or already restored.');
    }

    public function stateDelete($id)
    {
        $state = State::withTrashed()->find($id);

        if ($state) {
            $state->forceDelete();

            return redirect()->route('state-trash')->with('success', 'State successfully permanently deleted!');
        }

        return redirect()->route('state-trash')->with('error', 'State not found.');
    }
}
