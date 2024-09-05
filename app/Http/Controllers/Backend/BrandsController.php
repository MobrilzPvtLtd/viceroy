<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use Carbon\Carbon;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brands::where('deleted_at', null)->get();
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
        // Fetch the existing brand by ID
        $brand = Brands::findOrFail($id);

        // Validate the incoming request
        $request->validate([
            'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Generate a new filename
            $imageName = time() . '.' . $request->image->extension();

            // Move the new image to the public/images directory
            $request->image->move(public_path('images'), $imageName);

            // Delete the old image if it exists
            if ($brand->image && file_exists(public_path('images/' . $brand->image))) {
                unlink(public_path('images/' . $brand->image));
            }

            // Update the brand's image
            $brand->image = $imageName;
        }

        // Save the updated brand details
        $brand->save();

        // Redirect to the brand index page with a success message
        return redirect()->route('brand.index')->with('success', 'Brand has been updated successfully.');
    }

    public function brandTrash() {
        $brands = Brands::where('deleted_at', '!=', null)->orderBy('deleted_at', 'desc')->get();

        return view("backend.brand.trash", compact('brands'));
    }

    public function destroy($id)
    {
        $brand = Brands::find($id);
        if ($brand) {
            $brand->deleted_at = Carbon::now();
            $brand->save();
        }
        return redirect()->route('brand.index')->with('success', 'Brands successfully deleted!');
    }

    public function brandRestore($id)
    {
        $brand = Brands::find($id);
        if ($brand) {
            $brand->deleted_at = null;
            $brand->save();
        }
        return redirect()->route('brand-trash')->with('success', 'Brands successfully restored!');
    }

    public function brandDelete($id)
    {
        $brand = Brands::find($id);

        $brand->delete();

        return redirect()->route('brand-trash')->with('success', 'Brands successfully permanently deleted!');
    }
}
