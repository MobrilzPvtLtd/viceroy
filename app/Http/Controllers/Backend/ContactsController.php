<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('backend.contact.massage',compact('contacts'));
    }


}
