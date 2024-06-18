<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;

class InquairyController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::all();
        $titles = Checkout::all();
        return view('backend.inquairy.inquairy', compact('checkouts','titles'));
    }
}
