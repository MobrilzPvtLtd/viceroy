<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Checkout;
use Illuminate\Http\Request;
use App\Mail\CheckoutMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function submit(Request $request)
    {
        // dd($request);
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
        $email = $request->email;
        $date = $request->date;
        $st_time = $request->st_time;
        $en_time = $request->en_time;
        $massage = $request->massage;
        $user = Auth::user();
        $checkout = new Checkout();
        $checkout->title = json_encode($titles);
        $checkout->image = json_encode($images);
        $checkout->name = $user->name;;
        $checkout->number = $number;
        $checkout->email = $user->email;
        $checkout->date = $date;
        $checkout->st_time = $st_time;
        $checkout->en_time = $en_time;
        $checkout->massage = $massage;
        $checkout->save();

        $url_type = $request->url_type;

        $admin = User::where('id', 1)->first();

        if ($checkout->email) {
            Mail::to($checkout->email)->send(new CheckoutMail($checkout, $url_type));
        }

        if ($admin->email) {
            Mail::to($admin->email)->send(new CheckoutMail($checkout, $url_type));
        }

        // Redirect back with success message
        return redirect()->route('thanks')->with('success', 'Inquiry has been submitted successfully.');
    }
}
