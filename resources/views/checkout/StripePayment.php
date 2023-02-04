<?php

use Stripe\Stripe;
use Gloudemans\Shoppingcart\Cart;
use Stripe\Checkout\Session;

class StripePayment
{
 public function __construct(readonly private string $clientSecret)
 {
     Stripe::setApiKey($this->clientSecret);
     Stripe::setApiVersion('2020-08-27');

 }
  public function startPayment( )
   {
    // $cartId=Cart::getId();
     $session= Session::create([
        'line_items' => [[
            'price_data' => [
              'currency' => 'eur',
              'product_data' => [
                'name' => 'T-shirt',
              ],
              'unit_amount' => 2000,
            ],
            'quantity' => 2,
          ]],
          'mode' => 'payment',
          'success_url' => 'https://example.com/success',
          'cancel_url' => 'https://example.com/cancel',
          'billing_address_collection'=>'required',
          'shipping_address_collection'=>[

          ],
          'metadata'=>[
            // 'cart_id'=>$cartId
          ]


      ]);
   }


}
