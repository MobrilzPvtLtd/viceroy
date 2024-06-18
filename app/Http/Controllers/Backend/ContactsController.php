<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Checkout;

class ContactsController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('backend.contact.massage',compact('contacts'));
    }

    public function is_view(){
        $contacts = Contact::all();
        foreach($contacts as $contact){
            $contact->is_view = 1;
            $contact->save();
        }
        return response()->json($contact);
    }

    public function is_viewchackout(){
        $checkouts = Checkout::all();
        foreach($checkouts as $checkout){
            $checkout->is_viewchackout = 1;
            $checkout->save();
        }
        return response()->json($checkout);
    }
}
