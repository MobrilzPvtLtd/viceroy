<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $propertyId = $request->input('id');
        $SessionData = [];

        $property = Property::find($propertyId);

        if (!$property) {

            $SessionData['Status'] = 0;
            $SessionData['Message'] = 'Propertu not found';
        }

        if ($request->session()->exists('cart')) {
            $cart = $request->session()->get('cart');
        } else {
            $cart = [];
        }

        $cart[$propertyId] = [
            "id" => $property->id,
            "title" => $property->title,
            "price" => $property->price,
            "image" => $property->image ? unserialize($property->image)[0] : null,
        ];

        $request->session()->put('cart', $cart);
        $SessionData['CartCount'] = count($request->session()->get('cart'));
        $SessionData['CartDetails'] = $request->session()->get('cart');
        $SessionData['Status'] = 1;
        $SessionData['Message'] = 'Property added to cart';

        // dd(count($SessionData));

        echo json_encode($SessionData);
    }

    // public function show(Request $request)
    // {

    //     $cart = $request->session()->get('cart');


    //     return view('frontend.includes.cart', compact('cart'));
    // }
    public function viewCartData(Request $request)
    {

        $SessionData = [];
        if ($request->session()->has('cart'))
        {
            $SessionData['CartCount'] = count($request->session()->get('cart'));
            $SessionData['CartDetails'] = $request->session()->get('cart');

        }else{
            $SessionData['CartCount'] = 0;
            $SessionData['CartDetails'] = array();
        }



        echo json_encode($SessionData);
    }

    public function DeleteIteme(Request $request)
    {
        $id = $request->input('id');
        // Remove from cart and retunr crurrent cart value
        $cartData = $request->session()->get('cart', []);
        if (isset($cartData[$id])) {
            unset($cartData[$id]);
        }
        $request->session()->put('cart', $cartData);
        $sessionData = [];
        $sessionData['CartCount'] = count($cartData);
        $sessionData['CartDetails'] = $cartData;
        return response()->json($sessionData);

    }
}
