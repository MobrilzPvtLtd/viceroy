<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;

class InquairyController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::get();
        return view('backend.inquairy.inquairy', compact('checkouts'));
    }

    public function show($id)
    {
        $checkout = Checkout::findOrFail($id);
        return view('backend.inquairy.show',compact('checkout'));
    }
}
