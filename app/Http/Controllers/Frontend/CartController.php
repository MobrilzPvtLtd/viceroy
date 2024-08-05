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
        $responseData = [];
        $cartExists = $request->session()->has('cart');
        $cart = $request->session()->get('cart', []);

        if ($request->remove) {
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
            }
            $request->session()->put('cart', $cart);

            $responseData['CartCount'] = count($cart);
            $responseData['Status'] = 1;
            $responseData['Message'] = 'Property removed from cart';
        } else {
            $property = Property::find($request->id);

            if (!$property) {
                $responseData['Status'] = 0;
                $responseData['Message'] = 'Property not found';
                return response()->json($responseData);
            }

            $cart[$request->id] = [
                "id" => $property->id,
                "title" => $property->title,
                "desc" => $property->desc,
                "price" => $property->price,
                "image" => $property->image ? unserialize($property->image)[0] : null,
            ];

            $request->session()->put('cart', $cart);

            $responseData['CartCount'] = count($cart);
            $responseData['Status'] = 1;
            $responseData['Message'] = 'Property added to cart';
            $responseData['disabled'] = $property->id;
        }

        if ($cartExists && !empty($cart)) {
            // $responseData['CartHTML'] = CartHelper::generateCartHTML($cart);
            $html = '';
            $cartIsEmpty = empty($cart);

            foreach ($cart as $item) {
                $html .= '
                    <div class="d-flex" style="width: 100%">
                        <div class="d-flex gap-4" style="width: 80%; padding: 16px;">
                            <img src="/public/' . htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') . '" class="cart_img">
                            <div class="cart_tittle" data-price="' . htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8') . '">
                                <h5>' . htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') . '</h5>
                                <p>' . htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8') . '</p>
                            </div>
                        </div>
                        <div class="cart_del_icon" style="width: 20%">
                            <i class="fa fa-trash" onclick="addToCartOrRemove(' . intval($item['id']) . ', \'remove\')" class="btn-remove" aria-hidden="true"></i>
                        </div>
                    </div>
                ';
            }

            $html .= '
                <div class="sidecart__footer"' . ($cartIsEmpty ? ' style="display: none;"' : '') . '>
                    <a href="/checkout" class="common_btn" id="checkoutButton">Checkout</a>
                </div>
            ';

            $responseData['CartHTML'] = $html;
        } else {
            $responseData['CartHTML'] = '<li><h5 style="text-align: center;margin-top: 52px;">Your cart is empty</h5></li>';
        }

        return response()->json($responseData);
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
            $html = '';
            $cartIsEmpty = empty($cart);
            $disabledItems = [];

            foreach ($cart as $item) {
                $html .= '
                    <div class="d-flex" style="width: 100%">
                        <div class="d-flex gap-4" style="width: 80%; padding: 16px;">
                            <img src="/public/' . htmlspecialchars($item['image'], ENT_QUOTES, 'UTF-8') . '" alt="' . htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') . '" class="cart_img">
                            <div class="cart_tittle" data-price="' . htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8') . '">
                                <h5>' . htmlspecialchars($item['title'], ENT_QUOTES, 'UTF-8') . '</h5>
                                <p>' . htmlspecialchars($item['desc'], ENT_QUOTES, 'UTF-8') . '</p>
                            </div>
                        </div>
                        <div class="cart_del_icon" style="width: 20%">
                            <i class="fa fa-trash" onclick="addToCartOrRemove(' . intval($item['id']) . ', \'remove\')" class="btn-remove" aria-hidden="true"></i>
                        </div>
                    </div>
                ';
                $disabledItems[] = $item['id'];

            }

            $html .= '
                <div class="sidecart__footer"' . ($cartIsEmpty ? ' style="display: none;"' : '') . '>
                    <a href="/checkout" class="common_btn" id="checkoutButton">Checkout</a>
                </div>
            ';

            $responseData['CartHTML'] = $html;
            $responseData['disabled'] = $disabledItems;

        } else {
            $responseData['CartHTML'] = '<li><h5 style="text-align: center; margin-top: 52px;">Your cart is empty</h5></li>';
            $responseData['CartCount'] = 0;
            $responseData['disabled'] = [];
        }

        return response()->json($responseData);
    }
}
