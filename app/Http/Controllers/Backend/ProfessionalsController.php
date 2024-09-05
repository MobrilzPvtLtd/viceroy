<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professionals;
use Carbon\Carbon;

class ProfessionalsController extends Controller
{
    public function index()
    {
        $professionals = Professionals::where('deleted_at', null)->get();
        return view('backend.professionals.index', compact('professionals'));
    }
    public function create()
    {

        return view('backend.professionals.create');
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'post' => 'required',
            'number' => 'required',
            'email' => '',
            'image' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        Professionals::create([
            'name' => $request->name,
            'post' => $request->post,
            'number' => $request->number,
            'email' => $request->email,
            'image' => $imageName,
        ]);


        return redirect()->route('professionals.index')->with('success', 'professionals has been created successfully.');
    }


    public function show()
    {
    }
    public function edit($id)
    {
        $professional = Professionals::find($id);
        return view('backend.professionals.edit', compact('professional'));
    }

    public function update(Request $request, $id)
    {
        // Find the professional by ID
        $professional = Professionals::findOrFail($id);

        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'post' => 'required',
            'number' => 'required',
            'email' => '',
            'image' => 'nullable',
        ]);

        if ($request->hasFile('image')) {
            if ($professional->image && file_exists(public_path('images/' . $professional->image))) {
                unlink(public_path('images/' . $professional->image));
            }
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $professional->image = $imageName;
        }
        $professional->name = $request->name;
        $professional->post = $request->post;
        $professional->number = $request->number;
        $professional->email = $request->email;
        $professional->save();
        return redirect()->route('professionals.index')->with('success', 'Professional has been updated successfully.');
    }

    public function professionalsTrash() {
        $professionals = Professionals::where('deleted_at', '!=', null)->orderBy('deleted_at', 'desc')->get();

        return view("backend.professionals.trash", compact('professionals'));
    }

    public function destroy($id)
    {
        $professional = Professionals::find($id);
        if ($professional) {
            $professional->deleted_at = Carbon::now();
            $professional->save();
        }
        return redirect()->route('professionals.index')->with('success', 'Professionals successfully deleted!');
    }

    public function professionalsRestore($id)
    {
        $professional = Professionals::find($id);
        if ($professional) {
            $professional->deleted_at = null;
            $professional->save();
        }
        return redirect()->route('professionals-trash')->with('success', 'Professionals successfully restored!');
    }

    public function professionalsDelete($id)
    {
        $professional = Professionals::find($id);

        $professional->delete();

        return redirect()->route('professionals-trash')->with('success', 'Professionals successfully permanently deleted!');
    }
}
