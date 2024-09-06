<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Facilities;
use App\Models\City;
use App\Models\Country;
use App\Models\State;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;



class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('id', 'like', "%$search%")
                ->orWhere('title', 'like', "%$search%");
        }
        $propertys = $query->whereNull('deleted_at')->paginate(10);
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
    public function fetchStates(Request $request)
    {
        $country = $request->country;
        $states = State::where('co_name', $country)->get(); // Assuming country_id is the foreign key

        $options = '<option value="">Select State</option>';
        foreach ($states as $state) {
            $options .= '<option value="' . $state->id . '">' . $state->st_name . '</option>';
        }

        return response()->json($options);
    }
    public function create()
    {
        $facilitiesy = Facilities::all();
        $countrys = Country::all();
        $citys = City::all();
        $states = State::all();
        return view('backend.property.create', compact('facilitiesy', 'countrys', 'states', 'citys'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'p_type' => 'required',
            'bed' => 'required',
            'area' => 'required',
            'size' => 'required',
            'address' => 'required',
            'price' => 'required',
            'desc' => '',
            'number_of_room' => 'required',
            'number_bathroom' => 'required',
            'year' => '',
            'video' => '',
            'facilities' => 'required',
            'hall' => 'required',
            'kichen' => 'required',
            'dining' => 'required',
        ]);

        // Handle image upload
        // $imagePaths = [];
        // if ($request->hasFile('image')) {
        //     foreach ($request->file('image') as $file) {
        //         $extension = $file->getClientOriginalExtension();
        //         $filename = time() . '_' . uniqid() . '.' . $extension;
        //         $file->move(public_path('uploads'), $filename);
        //         $imagePaths[] = 'uploads/' . $filename;
        //     }
        // }
        $propertyData = $request->except('image');
        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $file->store('property', 'public');
                $imagePaths[] = $imagePath;
            }
        }

        // Handle floor plan upload
        $propertyData = $request->except('floor_plan');
        $floor_planPaths = [];

        if ($request->hasFile('floor_plan')) {
            foreach ($request->file('floor_plan') as $file) {
                $floor_planPath = $file->store('property', 'public');
                $floor_planPaths[] = $floor_planPath;
            }
        }
        // $floor_planPaths = [];
        // if ($request->hasFile('floor_plan')) {
        //     foreach ($request->file('floor_plan') as $file) {
        //         $extension = $file->getClientOriginalExtension();
        //         $filename = time() . '_' . uniqid() . '.' . $extension;
        //         $file->move(public_path('uploads/blueprints'), $filename);
        //         $floor_planPaths[] = 'uploads/blueprints/' . $filename;
        //     }
        // }

        // Geocode the address
        $address = $request->input('address');
        $apiKey = "AIzaSyC5oJyFp78LqQzen5Dtp1m4zlS3a2M3de4";

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
        } else {
            Log::error('Google Geocoding API error', [
                'address' => $address,
                'response' => $geoData
            ]);
        }

        // $facilities = $request->input('facilities', []);
        $propertyData = $request->except('image', 'floor_plan', 'facilities', 'featured');
        if (!empty($imagePaths)) {
            $propertyData['image'] = json_encode($imagePaths);
        }
        if (!empty($imagePaths)) {
            $propertyData['floor_plan'] = json_encode($floor_planPaths);
        }
        if (!empty($facilities)) {
            $propertyData['facilities'] = json_encode($facilities);
        }
        $propertyData['latitude'] = $latitude;
        $propertyData['longitude'] = $longitude;
        $propertyData['featured'] = $request->has('featured');

        if (!empty($request->video)) {
            $video = explode("=", $request->video);

            if (count($video) > 1) {
                $propertyData['video'] = $video[1];
            } else {
                $propertyData['video'] = $request->video;
            }
        } else {
            $propertyData['video'] = null;
        }

        Property::create($propertyData);

        return redirect()->route('property.index')->with('success', 'Property has been created successfully.');
    }

    public function show() {}

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        // $property->image = unserialize($property->image);
        // $property->floor_plan = unserialize($property->floor_plan);
        $facilities = Facilities::all();
        $selectedFacilities = json_decode($property->facilities);
        $selectedFacilities = $selectedFacilities ?? [];

        $countrys = Country::all();
        $citys = City::all();
        $states = State::all();

        return view('backend.property.edit', compact('property', 'facilities', 'selectedFacilities', 'countrys', 'states', 'citys'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'p_type' => 'required',
            'bed' => 'required',
            'area' => 'required',
            'size' => 'required',
            'address' => 'required',
            'price' => 'required',
            'desc' => '',
            'number_of_room' => 'required',
            'number_bathroom' => 'required',
            'year' => '',
            'video' => '',
            'facilities' => 'required',
            'hall' => 'required',
            'kichen' => 'required',
            'dining' => 'required',
        ]);

        $property = Property::findOrFail($id);

        // $imagePaths = unserialize($property->image) ?: [];
        // if ($request->hasFile('image')) {
        //     foreach ($request->file('image') as $file) {
        //         $extension = $file->getClientOriginalExtension();
        //         $filename = time() . '_' . uniqid() . '.' . $extension;
        //         $file->move(public_path('uploads'), $filename);
        //         $imagePaths[] = 'uploads/' . $filename;
        //     }
        // }

        // $floor_planPaths = unserialize($property->floor_plan) ?: [];
        // if ($request->hasFile('floor_plan')) {
        //     foreach ($request->file('floor_plan') as $file) {
        //         $extension = $file->getClientOriginalExtension();
        //         $filename = time() . '_' . uniqid() . '.' . $extension;
        //         $file->move(public_path('uploads/blueprints'), $filename);
        //         $floor_planPaths[] = 'uploads/blueprints/' . $filename;
        //     }
        // }

        // Handle image upload
        $oldImagePath = $property->image;
        $propertyData = $request->except('image');
        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $imagePath = $file->store('property', 'public');
                $imagePaths[] = $imagePath;
            }

            if ($oldImagePath) {
                Storage::disk('public')->delete($oldImagePath);
            }
        }

        // Handle floor plan upload
        $oldFloorPaths = $property->floor_plan;

        $propertyData = $request->except('floor_plan');
        $floor_planPaths = [];

        if ($request->hasFile('floor_plan')) {
            foreach ($request->file('floor_plan') as $file) {
                $floor_planPath = $file->store('property', 'public');
                $floor_planPaths[] = $floor_planPath;
            }

            if ($oldFloorPaths) {
                Storage::disk('public')->delete($oldFloorPaths);
            }
        }

        // Geocode the address
        $address = $request->input('address');
        $apiKey = "AIzaSyC5oJyFp78LqQzen5Dtp1m4zlS3a2M3de4";
        $client = new \GuzzleHttp\Client();
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

        // Prepare data for database update
        // $facilities = $request->input('facilities', []);
        $propertyData = $request->except('floor_plan', 'featured');
        // $propertyData['image'] = serialize($imagePaths);
        if (!empty($imagePaths)) {
            $propertyData['image'] = json_encode($imagePaths);
        }
        if (!empty($floor_planPaths)) {
            $propertyData['floor_plan'] = json_encode($floor_planPaths);
        }
        if (!empty($facilities)) {
            $propertyData['facilities'] = json_encode($facilities);
        }

        // $propertyData['floor_plan'] = serialize($floor_planPaths);
        // $propertyData['facilities'] = serialize($facilities);
        $propertyData['latitude'] = $latitude;
        $propertyData['longitude'] = $longitude;
        $propertyData['featured'] = $request->has('featured');

        // Safely handle the video field
        $video = explode("=", $request->video);
        if (isset($video[1])) {
            $propertyData['video'] = $video[1];
        } else {
            $propertyData['video'] = ''; // or null, or some default value
        }

        // Update the property
        $property->update($propertyData);

        return redirect()->route('property.index')->with('success', 'Property has been updated successfully.');
    }

    public function propertyTrash() {
        $properties = Property::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);

        return view("backend.property.trash", compact('properties'));
    }

    public function destroy($id)
    {
        $property = Property::find($id);
        if ($property) {
            $property->deleted_at = Carbon::now();
            $property->save();
        }
        return redirect()->route('property.index')->with('success', 'Property successfully deleted!');
    }

    public function propertyRestore($id)
    {
        $property = Property::withTrashed()->find($id);

        if ($property && $property->trashed()) {
            $property->restore();
            return redirect()->route('property-trash')->with('success', 'Property successfully restored!');
        }

        return redirect()->route('property-trash')->with('error', 'Property not found or already restored.');
    }

    public function propertyDelete($id)
    {
        $property = Property::withTrashed()->find($id);

        if (!empty($property->image)) {
            // $imagePaths = json_encode($property->image);
            foreach (json_decode($property->image) as $imagePath) {
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }
            }
        }
        if (!empty($property->floor_plan)) {
            // $floorPlanPaths = unserialize($property->floor_plan);
            foreach (json_decode($property->image) as $floorPlanPath) {
                if (file_exists(public_path($floorPlanPath))) {
                    unlink(public_path($floorPlanPath));
                }
            }
        }

        if ($property) {
            $property->forceDelete();

            return redirect()->route('property-trash')->with('success', 'Property successfully permanently deleted!');
        }

        return redirect()->route('property-trash')->with('error', 'Property not found.');
    }
}
