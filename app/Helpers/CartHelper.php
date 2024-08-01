<?php
// app/Helpers/CartHelper.php

namespace App\Helpers;

class CartHelper
{
    public static function generateCartHTML($cart)
    {
        $html = '';
        $cartIsEmpty = empty($cart);

        foreach ($cart as $item) {

            $html .= '
                <div class="d-flex" style="width: 100%">
                    <div class="d-flex gap-4" style="width: 80%;padding: 16px;">
                    <img src="/public/' . $item['image'] . '" alt="' . $item['title'] . '" class="cart_img">
                        <div class="cart_tittle" data-price="' . $item['price'] . '">
                        <h5>' . $item['title'] . '</h5>
                        <p>'. $item['desc'] .'</p>
                        </div>
                    </div>
                    <div class="cart_del_icon" style="width: 20%">
                    <i class="fa fa-trash" onclick="addToCartOrRemove(' . intval($item['id']) . ', \'remove\')" class="btn-remove" aria-hidden="true"></i>
                    </div>
                </div>
            ';

            // $html .= '
            //     <li class="grid_4 item container">
            //         <div class="preview">
            //             <img style="width: 100px;" src="/public/' . $item['image'] . '" alt="' . $item['title'] . '">
            //         </div>
            //         <div class="details" data-price="' . $item['price'] . '">
            //             <h3>' . $item['title'] . '</h3>
            //         </div>
            //         <div class="inner_container">
            //             <div class="col_1of2 align-center picker">
            //                 <p>
            //                     <a href="#" onclick="addToCartOrRemove(' . intval($item['id']) . ', \'remove\')" class="btn-remove">
            //                         <i class="far fa-trash-alt"></i>
            //                     </a>
            //                 </p>
            //             </div>
            //         </div>
            //     </li>
            // ';
        }

        $html .= '
            <div class="sidecart__footer"' . ($cartIsEmpty ? ' style="display: none;"' : '') . '>
                <a href="/checkout" class="common_btn" id="checkoutButton">Checkout</a>
            </div>
        ';

        return $html;
    }
}
?>



