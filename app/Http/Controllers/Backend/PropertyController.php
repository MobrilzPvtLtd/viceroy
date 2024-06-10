<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Facilities;
use App\Models\City;
use App\Models\Currency;
use App\Models\Country;
use GuzzleHttp\Client;



class PropertyController extends Controller
{

    public function index()
    {
        $propertys = Property::all();
        return view('backend.property.index', compact('propertys'));
    }
    public function fetchCity(Request $request)
    {
        $options = "";
        $city = City::where('co_name', $request->country)->get();
        foreach ($city as $cit) {
            $options .= "<option value=" . $cit->id . ">" . $cit->ct_name . "</option>";
        }
        return response()->json($options);
    }
    public function create()
    {
        $facilitiesy = Facilities::all();
        $countrys = Country::all();
        $citys = City::all();
        return view('backend.property.create', compact('facilitiesy', 'countrys', 'citys'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'p_type' => 'required',
            'bed' => 'required',
            'area' => 'required',
            'address' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'number_of_room' => 'required',
            'property_status' => 'required',
            'number_bathroom' => 'required',
            'year' => 'required',
            'map' => 'required',
            'video' => 'required',
            'p_id' => 'required',
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

        // Geocode the address
        $address = $request->input('address');
        $apiKey = env('GEO_CODE_GOOGLE_MAP_API');
        $client = new Client();
        $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
            'query' => [
                'address' => $address,
                'key' => $apiKey,
            ],
        ]);

        $geoData = json_decode($response->getBody(), true);

        $latitude = null;
        $longitude = null;

        if (!empty($geoData['results'][0])) {
            $location = $geoData['results'][0]['geometry']['location'];
            $latitude = $location['lat'];
            $longitude = $location['lng'];
        }

        // Prepare data for database insertion
        $facilities = $request->input('facilities', []);
        $propertyData = $request->except('image', 'floor_plan', 'facilities','featured');
        $propertyData['image'] = serialize($imagePaths);
        $propertyData['floor_plan'] = serialize($floor_planPaths);
        $propertyData['facilities'] = serialize($facilities);
        $propertyData['latitude'] = $latitude;
        $propertyData['longitude'] = $longitude;
        $propertyData['featured'] = $request->has('featured');

        // Create the property
        Property::create($propertyData);

        return redirect()->route('property.index')->with('success', 'Property has been created successfully.');
    }

    public function show()
    {
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $property->image = unserialize($property->image);
        $property->floor_plan = unserialize($property->floor_plan);
        $facilities = Facilities::all();
        $selectedFacilities = unserialize($property->facilities);

        return view('backend.property.edit', compact('property', 'facilities', 'selectedFacilities'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'p_type' => 'required',
            'bed' => 'required',
            'area' => 'required',
            'address' => 'required',
            'price' => 'required',
            'desc' => 'required',
            'number_of_room' => 'required',
            'property_status' => 'required',
            'number_bathroom' => 'required',
            'year' => 'required',
            'map' => 'required',
            'video' => 'required',
            'p_id' => 'required',
            'facilities' => 'required',
        ]);

        $property = Property::findOrFail($id);

        $imagePaths = unserialize($property->image);
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $imagePaths[] = 'uploads/' . $filename;
            }
        }

        $floor_planPaths = unserialize($property->floor_plan);
        if ($request->hasFile('floor_plan')) {
            foreach ($request->file('floor_plan') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads/blueprints'), $filename);
                $floor_planPaths[] = 'uploads/blueprints/' . $filename;
            }
        }

        $newAddress = $request->input('address');
        $latitude = $property->latitude;
        $longitude = $property->longitude;

        if ($newAddress !== $property->address) {
            $apiKey = env('GEO_CODE_GOOGLE_MAP_API');
            $client = new Client();
            $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json', [
                'query' => [
                    'address' => $newAddress,
                    'key' => $apiKey,
                ],
            ]);

            $geoData = json_decode($response->getBody(), true);

            if (!empty($geoData['results'][0])) {
                $location = $geoData['results'][0]['geometry']['location'];
                $latitude = $location['lat'];
                $longitude = $location['lng'];
            }
        }

        $facilities = $request->input('facilities', []);
        $propertyData = $request->except('image', 'floor_plan', 'facilities');
        $propertyData['image'] = serialize($imagePaths);
        $propertyData['floor_plan'] = serialize($floor_planPaths);
        $propertyData['facilities'] = serialize($facilities);
        $propertyData['latitude'] = $latitude;
        $propertyData['longitude'] = $longitude;

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
