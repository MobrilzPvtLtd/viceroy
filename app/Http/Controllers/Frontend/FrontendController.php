<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

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

        return view('frontend.pages.buy');
    }
    public function rent()
    {

        return view('frontend.pages.rent');
    }
    public function holiday()
    {

        return view('frontend.pages.holiday');
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
