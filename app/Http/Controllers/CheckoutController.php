<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use DateTime;


use Stripe\Stripe;
use Stripe\StripeClient;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;
$search=[];
class CheckoutController extends Controller
{

    public function checkout()
    {


        if(Cart::count()<=0)
        {
                return redirect()->route('products.index');
        }
        // Enter Your Stripe Secret
        \Stripe\Stripe::setApiKey('sk_test_51Kp5tJGRaOhIEKLtouPZzW5F8bA3Dfr1IZzvVnMs7OPGgNYFRBO76yFnmY0m8NYPaFsGr1vqjtK7X2LGdLNpwPdT00wSBnBjMP');


		 $amount = ((int)(Cart::total()))*100;
		//  $amount *= 100;
		//  $amount *= 1;

        // $amount =  round((floatval($amount))) ;

        $payment_intent = \Stripe\PaymentIntent::create([
		    'description' => 'Stripe Test Payment',
			'amount' =>$amount,//correctement formater avant d'envoyer,imperatif (A faire)
			'currency' => 'XAF',
			'description' => 'Payment From All About Laravel',
			'payment_method_types' => ['card'],
		]);
         $search=$payment_intent;
		$intent = $payment_intent->client_secret;
//

	        	return view('checkout.index',['intent'=>$payment_intent]);
		// return view('checkout.index',compact('intent'));

    }

   public function ThankYou()
   {
     return   view('checkout.merci') ;
   }

    public function afterPayment(Request $request)
    {
        // global $search;
    //    dd($search);
    //   dd($request);
          //store payment in database

          $paymentIntent=$request->json()->all();//a verifier si la recuperation est effective à via REQUEST
          $order=new Orders();
          Cart::destroy();
          return   view('checkout.merci') ;

    }
}
