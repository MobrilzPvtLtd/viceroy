<?php

namespace App\Http\Controllers\Frontend;

use App\Helpers\CartHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $sessionData = [];
        $cartExists = $request->session()->has('cart');
        $cart = $request->session()->get('cart', []);

        if ($request->remove) {
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
            }
            $request->session()->put('cart', $cart);

            $sessionData['CartCount'] = count($cart);
            $sessionData['Status'] = 1;
            $sessionData['Message'] = 'Property removed from cart';
        } else {
            $property = Property::find($request->id);

            if (!$property) {
                $sessionData['Status'] = 0;
                $sessionData['Message'] = 'Property not found';
                return response()->json($sessionData);
            }

            $cart[$request->id] = [
                "id" => $property->id,
                "title" => $property->title,
                "desc" => $property->desc,
                "price" => $property->price,
                "image" => $property->image ? unserialize($property->image)[0] : null,
            ];

            $request->session()->put('cart', $cart);

            $sessionData['CartCount'] = count($cart);
            $sessionData['Status'] = 1;
            $sessionData['Message'] = 'Property added to cart';
            $sessionData['disabled'] = $property->id;
        }

        if ($cartExists && !empty($cart)) {
            $sessionData['CartHTML'] = CartHelper::generateCartHTML($cart);
        } else {
            $sessionData['CartHTML'] = '<li><h5 style="text-align: center;margin-top: 52px;">Your cart is empty</h5></li>';
        }

        return response()->json($sessionData);
    }

    public function viewCartData(Request $request)
    {
        $responseData = [
            'CartCount' => 0,
            'CartHTML' => '',
        ];

        $cartExists = $request->session()->has('cart');
        $cart = $request->session()->get('cart', []);

        if ($cartExists && !empty($cart)) {
            $responseData['CartCount'] = count($cart);
            $responseData['CartHTML'] = CartHelper::generateCartHTML($cart);
        } else {
            $responseData['CartHTML'] = '<li><h5 style="text-align: center;margin-top: 52px;">Your cart is empty</h5></li>';
        }

        return response()->json($responseData);
    }
}
