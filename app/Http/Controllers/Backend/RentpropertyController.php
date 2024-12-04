<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rent;

class RentpropertyController extends Controller
{


    public function index()
    {
        $rents = Rent::all();
        return view('backend.rent.index', compact('rents'));
    }



    public function create()
    {
        return view('backend.rent.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'address' => 'required',
            'beds' => 'required',
            'bath' => 'required',
            'area' => 'required',
            'p_type' => 'required',
            'url' => 'required',
        ]);
        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $imagePaths[] = $filename;
            }
        }
        $rentData = $request->except('image');
        $rentData['image'] = json_encode($imagePaths);
        Rent::create($rentData);
        return redirect()->route('rent.index')->with('success', 'rent has been created successfully.');
    }

    public function show()
    {
    }

    public function edit(Rent $rent)
    {
        return view('backend.rent.edit', compact('rent'));
    }

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'address' => 'required',
        'beds' => 'required',
        'bath' => 'required',
        'area' => 'required',
        'p_type' => 'required',
        'url' => 'required',
    ]);

    $rent = Rent::findOrFail($id);

    $imagePaths = [];
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $imagePaths[] = $filename;
        }
        // Delete old images
        foreach(json_decode($rent->image) as $oldImage) {
            if(file_exists(public_path('uploads/' . $oldImage))) {
                unlink(public_path('uploads/' . $oldImage));
            }
        }
    }

    $rentData = $request->except('image');
    $rentData['image'] = json_encode($imagePaths);

    $rent->update($rentData);

    return redirect()->route('rent.index')->with('success', 'rent has been updated successfully.');
}

    public function destroy(Rent $rent)
    {
        $rent->delete();
        return redirect()->route('rent.index');
    }
}
