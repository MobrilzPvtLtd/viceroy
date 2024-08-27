<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Property;
use App\Models\Holiday;
use App\Models\Checkout;
use Illuminate\Http\Request;


class BackendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $contacts = Contact::all()->count();
        $checkouts = Checkout::all()->count();
        $properties = Property::all()->count();
        $propertys = Property::where('type', 'buy')->count();
        $rentCount = Property::where('type', 'rent')->count();
        $holidayCount = Holiday::all()->count();

        return view('backend.index',compact('propertys','rentCount','holidayCount','contacts','checkouts','properties'));
    }

}
