<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy;

class BuypropertyController extends Controller
{

    public function index()
    {
        $buys = Buy::all();
        return view('backend.buy.index',compact('buys'));
    }



    public function create()
    {
        return view('backend.buy.create');
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
        $buyData = $request->except('image');
        $buyData['image'] = json_encode($imagePaths);
        Buy::create($buyData);
        return redirect()->route('buy.index')->with('success', 'Holiday has been created successfully.');
    }

    public function show()
    {
    }

    public function edit(Buy $buy)
    {
        return view('backend.buy.edit', compact('buy'));
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

    $buy = Buy::findOrFail($id);

    $imagePaths = [];
    if ($request->hasFile('image')) {
        foreach ($request->file('image') as $file) {
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            $file->move(public_path('uploads'), $filename);
            $imagePaths[] = $filename;
        }
        // Delete old images
        foreach(json_decode($buy->image) as $oldImage) {
            if(file_exists(public_path('uploads/' . $oldImage))) {
                unlink(public_path('uploads/' . $oldImage));
            }
        }
    }

    $buyData = $request->except('image');
    $buyData['image'] = json_encode($imagePaths);

    $buy->update($buyData);

    return redirect()->route('buy.index')->with('success', 'buy has been updated successfully.');
}

    public function destroy(Buy $buy)
    {
        $buy->delete();
        return redirect()->route('buy.index');
    }
}
