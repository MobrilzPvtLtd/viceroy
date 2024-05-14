<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Buy;
use App\Models\Holiday;
use App\Models\Rent;
use App\Models\Country;
use App\Models\Currency;
use App\Models\City;
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
        return view('frontend.index');

    }
    public function about()
    {
        return view('frontend.pages.about');

    }

    public function buy()
    {
        $buys = Buy::orderBy('id','desc')->paginate(6);
        return view('frontend.pages.buy',compact('buys'));
    }
    public function rent()
    {
        $rents = Rent::orderBy('id','desc')->paginate(6);
        $countrys = Country::all();
        $citys = City::all();
        $currencys = Currency::all();
        return view('frontend.pages.rent',compact('rents','countrys','citys','currencys'));
    }
    public function holiday()
    {
        $holidays = Holiday::orderBy('id','desc')->paginate(6);
        return view('frontend.pages.holiday',compact('holidays'));
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
