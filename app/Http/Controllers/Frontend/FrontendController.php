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
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    /**
     * Retrieves the view for the index page of the frontend.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $countrys = Country::all();
        $citys = City::all();
        $currencys = Currency::all();
        return view('frontend.index',compact('countrys','citys','currencys'));

    }
    public function about()
    {
        return view('frontend.pages.about');

    }

    public function buy()
    {
        $propertys = Property::orderBy('id','desc')->paginate(6);
        $countrys = Country::all();
        $citys = City::all();
        $currencys = Currency::all();
        return view('frontend.pages.buy',compact('propertys','countrys','citys','currencys'));
    }
    public function rent()
    {
        $propertys = Property::orderBy('id','desc')->paginate(6);
        $countrys = Country::all();
        $citys = City::all();
        $currencys = Currency::all();
        return view('frontend.pages.rent', compact('propertys','countrys','citys','currencys'));
    }
    public function fetchCity(Request $request){
        $options = "";
        $city = City::where('co_name', $request->country)->get();
        foreach($city as $cit){
            $options .="<option value=".$cit->id.">".$cit->ct_name."</option>";
        }
        return response()->json($options);
    }
    public function holiday()
    {
        $holidays = Holiday::orderBy('id','desc')->paginate(6);
        return view('frontend.pages.holiday',compact('holidays'));
    }
    public function propertydetails()
    {

        return view('frontend.pages.property_details');
    }
    public function services()
    {

        return view('frontend.pages.services');
    }
    public function contact()
    {

        return view('frontend.pages.contact');
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
        return view('frontend.privacy');
    }

    /**
     * Terms & Conditions Page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function terms()
    {
        return view('frontend.terms');
    }
}
