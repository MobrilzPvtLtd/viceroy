<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Checkout;

class ContactsController extends Controller
{
    public function index(){
        $contacts = Contact::get();
        return view('backend.contact.message',compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('backend.contact.show',compact('contact'));
    }

    public function is_view(Request $request){
        // dd($request);
        if ($request->has('contactId')) {
            $contact = Contact::find($request->contactId);

            if ($contact) {
                $contact->status = $contact->status === 'open' ? 'close' : 'open';
                $contact->save();

                return redirect()->back();
            }
        } else {
            $contacts = Contact::get();
            foreach ($contacts as $contact) {
                $contact->is_view = 1;
                $contact->save();
            }

            return response()->json($contact);
        }
    }

    public function is_viewchackout(Request $request){
        if ($request->has('checkoutId')) {
            $checkout = Checkout::find($request->checkoutId);

            if ($checkout) {
                $checkout->status = $checkout->status === 'open' ? 'close' : 'open';
                $checkout->save();

                return redirect()->back();
            }
        } else {
            $checkouts = Checkout::get();

            foreach ($checkouts as $checkout) {
                $checkout->is_viewchackout = 1;
                $checkout->save();
            }

            return response()->json($checkout);
        }
    }
}
