<?php

use Gloudemans\Shoppingcart\Facades\Cart;


function getPrice( $price)
{
    $price=floatval($price)/100;
            return number_format($price/100,2,'.',' ')." Fcfa";
}



function getNumbers()
{
    //  $tax =floatval(config('cart.tax') / 100) ;
//    / $discount = session()->get('coupon')['discount'] ?? 0;
    // $code = session()->get('coupon')['name'] ?? null;
    //   $newSubtotal = (Cart::subtotal() - $discount);
      $newSubtotal =  Cart::subtotal();
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }

    $newTax = Cart::tax();
    // $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal ;
     $newTotal = $newSubtotal;

    return collect([
        // 'tax' => $tax,
        // 'discount' => $discount,
        // 'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal,
    ]);
}
