<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::all();
        return view('backend.brand.index', compact('brands'));
    }
    public function create()
    {

        return view('backend.brand.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);


        Brands::create([
            'image' => $imageName,
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand has been created successfully.');
    }

    public function show()
    {
    }
    public function edit($id)
    {
        $brand = Brands::find($id);
        return view('backend.brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable',
        ]);

        $brand = Brands::findOrFail($id);

        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            if (public_path('images/' . $brand->image)) {
                unlink(public_path('images/' . $brand->image));
            }
            $brand->update(['image' => $imageName]);
        }
        $brand->save();

        return redirect()->route('brand.index')->with('success', 'Brand has been updated successfully.');
    }

    public function destroy(Brands $brand)
    {
        $brand->delete();
        return redirect()->route('brand.index');
    }
}
