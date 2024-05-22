<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Facilities;

class PropertyController extends Controller
{

    public function index()
    {
        $propertys = Property::all();
        return view('backend.property.index', compact('propertys'));
    }



    public function create()
    {

        $facilitiesy = Facilities::all();
        return view('backend.property.create', compact('facilitiesy'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'p_type' => 'required',
            'bed' => 'required',
            'area' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'number_of_room' => 'required',
            'property_status' => 'required',
            'number_bathroom' => 'required',
            'year' => 'required',
            'map' => 'required',
            'video' => 'required',
            'p_id' => 'required',
            'slag' => 'required',
            'facilities' => 'required',

        ]);

        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $imagePaths[] = 'uploads/' . $filename; // Store the file path directly
            }
        }

        $floor_planPaths = [];
        if ($request->hasFile('floor_plan')) {
            foreach ($request->file('floor_plan') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads/blueprints'), $filename);
                $floor_planPaths[] = 'uploads/blueprints/' . $filename; // Store the file path directly
            }
        }
        // Prepare data for database insertion
        $facilities = $request->input('facilities', []);
        $propertyData = $request->except('image', 'floor_plan', 'facilities');
        $propertyData['image'] = serialize($imagePaths);
        $propertyData['floor_plan'] = serialize($floor_planPaths);
        $propertyData['facilities'] = serialize($facilities);
        // Create the property
        Property::create($propertyData);

        return redirect()->route('property.index')->with('success', 'property has been created successfully.');
    }

    public function show()
    {
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        // Deserialize image paths and floor plan paths
        $property->image = unserialize($property->image);
        $property->floor_plan = unserialize($property->floor_plan);
        $facilities = Facilities::all();
        $selectedFacilities = unserialize($property->facilities);

        return view('backend.property.edit', compact('property','facilities','selectedFacilities'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'p_type' => 'required',
            'bed' => 'required',
            'area' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'number_of_room' => 'required',
            'property_status' => 'required',
            'number_bathroom' => 'required',
            'year' => 'required',
            'map' => 'required',
            'video' => 'required',
            'p_id' => 'required',
            'slag' => 'required',
            'facilities' => 'required',
        ]);

        $property = Property::findOrFail($id);

        // Handle image uploads
        $imagePaths = unserialize($property->image);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $imagePaths[] = 'uploads/' . $filename;
            }
        }

        // Handle floor plan uploads
        $floor_planPaths = unserialize($property->floor_plan);
        if ($request->hasFile('floor_plan')) {
            foreach ($request->file('floor_plan') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads/blueprints'), $filename);
                $floor_planPaths[] = 'uploads/blueprints/' . $filename;
            }
        }

        // Prepare data for database update
        $facilities = $request->input('facilities', []);
        $propertyData = $request->except('image', 'floor_plan', 'facilities');
        $propertyData['image'] = serialize($imagePaths);
        $propertyData['floor_plan'] = serialize($floor_planPaths);
        $propertyData['facilities'] = serialize($facilities);

        // Update the property
        $property->update($propertyData);

        return redirect()->route('property.index')->with('success', 'Property has been updated successfully.');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        // Delete associated images and floor plans from storage
        if (!empty($property->image)) {
            $imagePaths = unserialize($property->image);
            foreach ($imagePaths as $imagePath) {
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath)); // Delete image from storage
                }
            }
        }
        if (!empty($property->floor_plan)) {
            $floorPlanPaths = unserialize($property->floor_plan);
            foreach ($floorPlanPaths as $floorPlanPath) {
                if (file_exists(public_path($floorPlanPath))) {
                    unlink(public_path($floorPlanPath)); // Delete floor plan from storage
                }
            }
        }

        // Delete the property from the database
        $property->delete();

        return redirect()->route('property.index')->with('success', 'Rent has been deleted successfully.');
    }
}
