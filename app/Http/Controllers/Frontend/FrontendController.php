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
        $query = Property::query()->where('type', 'buy');
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
        $propertys = $query->orderBy('id', 'desc')->paginate(6);
        $uniquePropertyTypes = Property::whereIn('type', ['buy', 'rent'])->distinct()->pluck('p_type')->sort();
        $uniqueBedrooms = Property::whereIn('type', ['buy', 'rent'])->distinct()->pluck('number_of_room')->sort();
        $uniquePrices = Property::whereIn('type', ['buy', 'rent'])->distinct()->pluck('price')->sort();
        $propertys = Property::all();
        $countrys = Country::all();
        $citys = City::all();
        $brands = Brands::all();
        $currencys = Currency::all();
        return view('frontend.index', compact('propertys', 'countrys', 'citys', 'brands', 'currencys', 'uniqueBedrooms', 'uniquePrices', 'uniquePropertyTypes'));
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
        $propertys = $query->orderBy('id', 'desc')->paginate(6);
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

                $infowindow[] = '<div class="info_content">
                                        .<h2>' . $property->title . '</h2>
                                        <h3>' . $property->address . '</h3>
                                        <a href="' . $property->slag . '">Show Property</a>
                                        </div>';
            }
        }


        // $markers = array_values($markers);
        // $markers = json_encode($markers);


        // $infowindow = array_values($infowindow);
        // $infowindow = json_encode($infowindow);
        $markers = $markers; //htmlspecialchars(json_encode(array_values($markers)), ENT_QUOTES, 'UTF-8');
        $infowindow = $infowindow; // htmlspecialchars(json_encode(array_values($infowindow)), ENT_QUOTES, 'UTF-8');

        //echo $markers; die();


        // $ReturData = array();
        // $ReturData['markers'] = $markers;
        // $ReturData['countrys'] = $countrys;
        // $ReturData['propertys'] = $propertys;
        // $ReturData['citys'] = $citys;
        // $ReturData['currencys'] = $currencys;
        // $ReturData['uniqueBedrooms'] = $uniqueBedrooms;
        // $ReturData['uniquePrices'] = $uniquePrices;
        // $ReturData['uniquePropertyTypes'] = $uniquePropertyTypes;
        // $ReturData['infowindow'] = $infowindow;

        // dd($markers);

        // return view('frontend.pages.buy')->with('data', $ReturData);


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
        $propertys = $query->orderBy('id', 'desc')->paginate(6);
        $uniquePropertyTypes = Property::where('type', 'rent')->distinct()->pluck('p_type')->sort();
        $uniqueBedrooms = Property::where('type', 'rent')->distinct()->pluck('number_of_room')->sort();
        $uniquePrices = Property::where('type', 'rent')->distinct()->pluck('price')->sort();
        $countrys = Country::all();
        $citys = City::all();
        $currencys = Currency::all();
        return view('frontend.pages.rent', compact('propertys', 'countrys', 'citys', 'currencys', 'uniqueBedrooms', 'uniquePrices', 'uniquePropertyTypes'));
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
        return view('frontend.pages.property', compact('property'));
    }
    //     public function show($id)
    // {
    //     $property = Property::findOrFail($id);
    //     return view('frontend.pages.property_details', compact('property'));
    // }
    public function services()
    {

        return view('frontend.pages.services');
    }
    public function contact()
    {

        return view('frontend.pages.contact');
    }
    public function about()
    {
        return view('frontend.pages.about');
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

        return view('frontend.pages.checkout', $sessionData);
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
}
