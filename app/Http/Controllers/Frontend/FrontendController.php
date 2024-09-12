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
use App\Models\User;
use App\Models\Professionals;
use App\Models\State;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;
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
        if ($request->has('st_name') && $request->st_name != '') {
            $query->where('state_id', $request->st_name);
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

        $uniquePropertyTypes = Property::where('type', 'buy')->distinct()->pluck('p_type');
        if (!$uniquePropertyTypes->contains('Villa','Apartment','Plot','Bungalows','Flats')) {
            $uniquePropertyTypes->push('Villa','Apartment','Plot','Bungalows','Flats');
        }
        $uniquePropertyTypes = $uniquePropertyTypes->unique()->sort()->values()->all();
        $uniqueBedrooms = Property::where('type', 'buy')->distinct()->pluck('number_of_room')->sort();
        $uniquePrices = Property::where('type', 'buy')->distinct()->pluck('price')->sort();
        $currencys = Currency::all();
        $countrys = Country::all();
        $citys = City::all();
        $states = State::all();
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
        // dd($infowindow);
        return view('frontend.pages.buy', compact('propertys', 'countrys', 'states', 'citys', 'currencys', 'uniqueBedrooms', 'uniquePrices', 'uniquePropertyTypes', 'markers', 'infowindow'));
    }
    public function rent(Request $request)
    {
        $query = Property::query()->where('type', 'rent');
        if ($request->has('co_name') && $request->co_name != '') {
            $query->where('country_id', $request->co_name);
        }
        if ($request->has('st_name') && $request->st_name != '') {
            $query->where('state_id', $request->st_name);
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
        $uniquePropertyTypes = Property::where('type', 'buy')->distinct()->pluck('p_type');
        if (!$uniquePropertyTypes->contains('Villa','Apartment','Plot','Bungalows','Flats')) {
            $uniquePropertyTypes->push('Villa','Apartment','Plot','Bungalows','Flats');
        }
        $uniquePropertyTypes = $uniquePropertyTypes->unique()->sort()->values()->all();
        $uniqueBedrooms = Property::where('type', 'rent')->distinct()->pluck('number_of_room')->sort();
        $uniquePrices = Property::where('type', 'rent')->distinct()->pluck('price')->sort();
        $countrys = Country::all();
        $citys = City::all();
        $currencys = Currency::all();
        $states = State::all();
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
        return view('frontend.pages.rent', compact('propertys', 'countrys', 'citys', 'states', 'currencys', 'uniqueBedrooms', 'uniquePrices', 'uniquePropertyTypes', 'markers', 'infowindow'));
    }
    public function fetchCity(Request $request)
    {
        $state = $request->state;
        // dd($state);
        $cities = City::where('st_name', $state)->get();

        $options = '<option value="">Select City</option>';
        foreach ($cities as $city) {
            $options .= '<option value="' . $city->id . '">' . $city->ct_name . '</option>';
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
    public function holiday()
    {
        $holidays = Holiday::orderBy('id', 'desc')->get();
        return view('frontend.pages.holiday', compact('holidays'));
    }
    public function propertydetails($slag)
    {
        $property = Property::where('slag', $slag)->firstOrFail();
        $address = $property->address;

        // Geocode the main property's address
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

        // Update the main property with latitude and longitude if not already set
        if ($property->latitude === null || $property->longitude === null) {
            $property->latitude = $latitude;
            $property->longitude = $longitude;
            $property->save();
        }

        // Radius in kilometers
        $radius = 10; // Adjust this value as needed

        $relatedProperties = Property::where('id', '!=', $property->id)
            ->whereBetween('latitude', [$latitude - $radius, $latitude + $radius])
            ->whereBetween('longitude', [$longitude - $radius, $longitude + $radius])
            ->get();

        // Prepare markers and infowindows
        $markers = [
            [$property->title, $latitude, $longitude]
        ];

        $infowindow = [
            [$property->title]
        ];

        $currencyPrice = Currency::where('code', 'USD')->first();

        return view('frontend.pages.property', compact('property', 'latitude', 'longitude', 'markers', 'infowindow', 'relatedProperties','currencyPrice'));
    }

    public function changeCurrency(Request $request) {
        $property = Property::where('slag', $request->slug)->first();

        $currency = Currency::where('code', $request->currency)->first();
        if (!$currency) {
            return response()->json(['error' => 'Currency not found'], 404);
        }

        $request->session()->put('prefix', $currency->prefix);
        $request->session()->put('price', $currency->bcr);
        $request->session()->put('currency', $currency->code);

        return redirect()->route('property',$property->slag);
    }

    // public function showPropertiesByAddress(Request $request)
    // {
    //     $address = $request->input('address');

    //     $properties = Property::where('address', 'LIKE', '%' . $address . '%')->get();
    //     return view('frontend.pages.property', compact('properties', 'address'));
    // }
    public function services()
    {
        $brands = Brands::get();
        return view('frontend.pages.services', compact('brands'));
    }
    public function testimonials()
    {
        $testimonials = Testimonial::get();
        return view('frontend.pages.testimonials', compact('testimonials'));
    }
    public function brand()
    {
        $brands = Brands::get();
        return view('frontend.pages.brand', compact('brands'));
    }
    public function realtors()
    {
        $brands = Brands::get();
        $professionals = Professionals::get();
        return view('frontend.pages.realtors', compact('brands','professionals'));
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
    public function login(Request $request)
    {
        if (!$request->session()->has('backUrl') && !Auth::check()) {
            $request->session()->put('backUrl', url()->previous());
        }
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

    public function india()
    {
        return view('frontend.pages.india');
    }

    public function uk()
    {
        return view('frontend.pages.uk');
    }
    public function uae()
    {
        return view('frontend.pages.uae');
    }
}
