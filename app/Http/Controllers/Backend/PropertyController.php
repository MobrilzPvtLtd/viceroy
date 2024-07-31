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
use App\Models\State;
use GuzzleHttp\Client;



class PropertyController extends Controller
{

    public function index()
    {
        $propertys =  Property::paginate(10);
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
        return view('backend.property.create', compact('facilitiesy', 'countrys', 'states','citys'));
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

        $imagePaths = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $imagePaths[] = 'uploads/' . $filename;
            }
        }

        $floor_planPaths = [];
        if ($request->hasFile('floor_plan')) {
            foreach ($request->file('floor_plan') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads/blueprints'), $filename);
                $floor_planPaths[] = 'uploads/blueprints/' . $filename;
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
        $propertyData = $request->except('image', 'floor_plan', 'facilities', 'featured');
        $propertyData['image'] = serialize($imagePaths);
        $propertyData['floor_plan'] = serialize($floor_planPaths);
        $propertyData['facilities'] = serialize($facilities);
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

        // Retrieve countries and cities
        $countrys = Country::all();
        $citys = City::all();

        return view('backend.property.edit', compact('property', 'facilities', 'selectedFacilities', 'countrys', 'citys'));
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

        $imagePaths = unserialize($property->image) ?: [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads'), $filename);
                $imagePaths[] = 'uploads/' . $filename;
            }
        }

        $floor_planPaths = unserialize($property->floor_plan) ?: [];
        if ($request->hasFile('floor_plan')) {
            foreach ($request->file('floor_plan') as $file) {
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '_' . uniqid() . '.' . $extension;
                $file->move(public_path('uploads/blueprints'), $filename);
                $floor_planPaths[] = 'uploads/blueprints/' . $filename;
            }
        }

        // Geocode the address
        $address = $request->input('address');
        $apiKey = env('GEO_CODE_GOOGLE_MAP_API');
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
        $facilities = $request->input('facilities', []);
        $propertyData = $request->except('image', 'floor_plan', 'facilities', 'featured');
        $propertyData['image'] = serialize($imagePaths);
        $propertyData['floor_plan'] = serialize($floor_planPaths);
        $propertyData['facilities'] = serialize($facilities);
        $propertyData['latitude'] = $latitude;
        $propertyData['longitude'] = $longitude;
        $propertyData['featured'] = $request->has('featured');
        $video = explode("=", $request->video);
        $propertyData['video'] = $video[1];

        // Update the property
        $property->update($propertyData);

        return redirect()->route('property.index')->with('success', 'Property has been updated successfully.');
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);

        if (!empty($property->image)) {
            $imagePaths = unserialize($property->image);
            foreach ($imagePaths as $imagePath) {
                if (file_exists(public_path($imagePath))) {
                    unlink(public_path($imagePath));
                }
            }
        }
        if (!empty($property->floor_plan)) {
            $floorPlanPaths = unserialize($property->floor_plan);
            foreach ($floorPlanPaths as $floorPlanPath) {
                if (file_exists(public_path($floorPlanPath))) {
                    unlink(public_path($floorPlanPath));
                }
            }
        }

        $property->delete();

        return redirect()->route('property.index')->with('success', 'Rent has been deleted successfully.');
    }
}
