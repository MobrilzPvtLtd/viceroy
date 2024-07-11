<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buy;
use App\Models\Holiday;
use App\Models\Rent;
use App\Models\Country;
use App\Models\Currency;
use App\Models\City;
use App\Models\Property;
use App\Models\Brands;
use App\Models\Professionals;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    /**
     * Retrieves the view for the index page of the frontend.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query = Property::query()->whereIn('type', ['buy', 'rent']);

        if ($request->has('co_name') && $request->co_name != '') {
            $query->where('country_id', $request->co_name);
        }
        if ($request->has('ct_name') && $request->ct_name != '') {
            $query->where('city_id', $request->ct_name);
        }
        if ($request->has('bedrooms') && $request->bedrooms != '') {
            $query->where('number_of_room', $request->bedrooms);
        }
        if ($request->has('price') && $request->price != '') {
            $query->where('price', $request->price);
        }
        if ($request->has('p_type') && $request->type != '') {
            $query->where('p_type', $request->type);
        }
        $propertys = Property::where('featured', '!=', 0)->paginate(6);
        $holidays = Holiday::where('featured', '!=', 0)->paginate(6);
        $uniquePropertyTypes = Property::whereIn('type', ['buy', 'rent'])->distinct()->pluck('p_type')->sort();
        $uniqueBedrooms = Property::whereIn('type', ['buy', 'rent'])->distinct()->pluck('number_of_room')->sort();
        $uniquePrices = Property::whereIn('type', ['buy', 'rent'])->distinct()->pluck('price')->sort();
        $countrys = Country::all();
        $citys = City::all();
        $brands = Brands::all();
        $currencys = Currency::all();
        $professionals = Professionals::all();


        return view('frontend.index', compact('propertys', 'countrys', 'citys', 'brands', 'currencys', 'uniqueBedrooms', 'uniquePrices', 'uniquePropertyTypes', 'professionals', 'holidays'));
    }
    public function buy(Request $request)
    {
        $query = Property::where('type', 'buy');
        if ($request->has('co_name') && $request->co_name != '') {
            $query->where('country_id', $request->co_name);
        }
        if ($request->has('ct_name') && $request->ct_name != '') {
            $query->where('city_id', $request->ct_name);
        }
        if ($request->has('bedrooms') && $request->bedrooms != '') {
            $query->where('number_of_room', $request->bedrooms);
        }
        if ($request->has('price') && $request->price != '') {
            $query->where('price', $request->price);
        }
        if ($request->has('p_type') && $request->type != '') {
            $query->where('p_type', $request->type);
        }
        $propertys = $query->orderBy('id', 'desc')->get();
        $uniquePropertyTypes = Property::where('type', 'buy')->distinct()->pluck('p_type')->sort();
        $uniqueBedrooms = Property::where('type', 'buy')->distinct()->pluck('number_of_room')->sort();
        $uniquePrices = Property::where('type', 'buy')->distinct()->pluck('price')->sort();
        $currencys = Currency::all();
        $countrys = Country::all();
        $citys = City::all();
        // get map data
        $markers = [];
        $infowindow = [];
        foreach ($propertys as $property) {
            if (!empty($property->latitude) && !empty($property->longitude)) {
                $markers[] = array($property->address, $property->latitude, $property->longitude);

                $infowindow[] = array('<div class="info_content"><h2>' . $property->title . '</h2><h3>' . $property->address . '</h3><a href="/property/' . $property->slag . '">Show Property</a></div>');
            }
        }
        $markers = $markers;
        $infowindow = $infowindow;
        return view('frontend.pages.buy', compact('propertys', 'countrys', 'citys', 'currencys', 'uniqueBedrooms', 'uniquePrices', 'uniquePropertyTypes', 'markers', 'infowindow'));
    }
    public function rent(Request $request)
    {
        $query = Property::query()->where('type', 'rent');
        if ($request->has('co_name') && $request->co_name != '') {
            $query->where('country_id', $request->co_name);
        }
        if ($request->has('ct_name') && $request->ct_name != '') {
            $query->where('city_id', $request->ct_name);
        }
        if ($request->has('bedrooms') && $request->bedrooms != '') {
            $query->where('number_of_room', $request->bedrooms);
        }
        if ($request->has('price') && $request->price != '') {
            $query->where('price', $request->price);
        }
        if ($request->has('p_type') && $request->type != '') {
            $query->where('p_type', $request->type);
        }
        $propertys = $query->orderBy('id', 'desc')->get();
        $uniquePropertyTypes = Property::where('type', 'rent')->distinct()->pluck('p_type')->sort();
        $uniqueBedrooms = Property::where('type', 'rent')->distinct()->pluck('number_of_room')->sort();
        $uniquePrices = Property::where('type', 'rent')->distinct()->pluck('price')->sort();
        $countrys = Country::all();
        $citys = City::all();
        $currencys = Currency::all();
        $markers = [];
        $infowindow = [];
        foreach ($propertys as $property) {
            if (!empty($property->latitude) && !empty($property->longitude)) {
                $markers[] = array($property->address, $property->latitude, $property->longitude);

                $infowindow[] = array('<div class="info_content"><h2>' . $property->title . '</h2><h3>' . $property->address . '</h3><a href="/property/' . $property->slag . '">Show Property</a></div>');
            }
        }

        $markers = $markers;
        $infowindow = $infowindow;
        return view('frontend.pages.rent', compact('propertys', 'countrys', 'citys', 'currencys', 'uniqueBedrooms', 'uniquePrices', 'uniquePropertyTypes', 'markers', 'infowindow'));
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
    public function holiday()
    {
        $holidays = Holiday::orderBy('id', 'desc')->paginate(6);
        return view('frontend.pages.holiday', compact('holidays'));
    }
    public function propertydetails($slag)
    {
        $property = Property::where('slag', $slag)->firstOrFail();
        // dd($property->video);
        // Geocode the address
        $address = $property->address;
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

        // Create the markers array
        $markers = [
            [$property->title, $latitude, $longitude]
        ];

        $infowindow = [
            [$property->title]
        ];

        return view('frontend.pages.property', compact('property', 'latitude', 'longitude', 'markers', 'infowindow'));
    }

    //     public function show($id)
    // {
    //     $property = Property::findOrFail($id);
    //     return view('frontend.pages.property_details', compact('property'));
    // }
    public function services()
    {
        $brands = Brands::all();
        return view('frontend.pages.services', compact('brands'));
    }
    public function contact()
    {

        return view('frontend.pages.contact');
    }
    public function about()
    {
        $professionals = Professionals::all();
        $brands = Brands::all();
        return view('frontend.pages.about', compact('professionals', 'brands'));
    }
    public function login()
    {

        return view('frontend.pages.login');
    }
    public function register()
    {

        return view('frontend.pages.register');
    }
    /**
     * Privacy Policy Page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function privacy()
    {
        return view('frontend.pages.privacy&poly');
    }

    public function cartform(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $sessionData = [];
        $sessionData['CartCount'] = count($cart);
        $sessionData['CartDetails'] = $cart;

        return view('frontend.pages.checkout', compact('sessionData'));
    }

    /**
     * Terms & Conditions Page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function terms()
    {

        return view('frontend.pages.terms&con');
    }
    public function thanks()
    {
        return view('frontend.pages.thanks');
    }
}
