<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Mail\CheckoutMail;
use Illuminate\Support\Facades\Mail;


class CheckoutController extends Controller
{
    public function submit(Request $request)
    {
        // Uncomment and adjust validation rules if needed
        // $request->validate([
        //     'co_name' => 'required',
        //     'st_name' => 'required',
        // ]);

        // Get titles and store in session
        $titles = $request->input('title');
        $images = $request->input('image');
        // $request->session()->put('selected_titles', json_encode($titles));
        // dd($titles,$images);
        $name = $request->name;
        $number = $request->number;
        $date = $request->date;
        $st_time = $request->st_time;
        $en_time = $request->en_time;
        $massage = $request->massage;
        $checkout = new Checkout();
        $checkout->title = json_encode($titles);
        $checkout->image = json_encode($images);
        $checkout->name = $name;
        $checkout->number = $number;
        $checkout->date = $date;
        $checkout->st_time = $st_time;
        $checkout->en_time = $en_time;
        $checkout->massage = $massage;
        $checkout->save();
        Mail::to($checkout->email)->send(new CheckoutMail($checkout));
        // Redirect back with success message
        return redirect()->route('thanks')->with('success', 'Inquiry has been submitted successfully.');

    }

}
