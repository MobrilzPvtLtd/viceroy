<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    public function submit(Request $request)
    {
        // $request->validate([
        //      'co_name' => 'required',
        //     'st_name'=> 'required',
        // ]);

        $title = $request->title;
        $image = $request->image;

        $checkout = new Checkout();
        $checkout->title = $title;
        $checkout->image = $image;
        $checkout->name = $request->name;
        $checkout->number = $request->number;
        $checkout->date = $request->date;
        $checkout->st_time = $request->st_time;
        $checkout->en_time = $request->en_time;
        $checkout->massage = $request->massage;
        $checkout->save();

        return redirect()->back()->with('success', 'Country has been created successfully.');
    }
}
