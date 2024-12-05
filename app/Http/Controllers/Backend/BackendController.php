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
        $contacts = Contact::count();
        $checkouts = Checkout::count();
        $properties = Property::whereNull('deleted_at')->count();
        $propertys = Property::whereNull('deleted_at')->where('type', 'buy')->count();
        $rentCount = Property::whereNull('deleted_at')->where('type', 'rent')->count();
        $holidayCount = Holiday::whereNull('deleted_at')->count();

        return view('backend.index',compact('propertys','rentCount','holidayCount','contacts','checkouts','properties'));
    }

}
