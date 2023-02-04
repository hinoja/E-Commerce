<?php

namespace App\Http\Controllers;


use Illuminate\View\View;
use Illuminate\Http\Request;
use TCG\Voyager\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  return \Illuminate\Http\Response
     */
    public function generatePDF()
    {
        // $data = [
        //     'cart' =>   Cart::content(),
        //     // 'date' => date('m/d/Y')

        // ];








        // $pdf = PDF::loadView('imprimer',$data);

        // return $pdf->download('index.pdf');

        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML('Cart.index');
        // return $pdf->stream();

        $cart = Cart::content();
        // $pdf->loadHTML($this->convert_orders_data_to_html());

        try {
            $pdf = App::make('dompdf.wrapper')->setPaper('a4', 'landscape');
            $pdf->loadHTML($this->convert_orders_data_to_html());

            return $pdf->stream();
        } catch (\Exception $e) {
            return redirect('')->route('products.index')->with('error', $e->getMessage());
        }


        // $pdf = Pdf::loadView("

        //    return $pdf->download('invoice.pdf');
    }

    //
    // }

    /**
     * Store a newly created resource in storage.
     *
     *  param  \Illuminate\Http\Request  $request
     *  return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     *  param  int  $id
     *  return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *  param  int  $id
     *  return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     *  param  \Illuminate\Http\Request  $request
     *  param  int  $id
     *  return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     *  param  int  $id
     *  return \Illuminate\Http\Response
     */
    public function convert_orders_data_to_html()
    {

        // $orders = User::where('id',Session::get('id'))->get();

        // foreach($orders as $order){
        //     $name = $order->name;
        //     $address = $order->address;
        //     $date = $order->created_at;
        // }

        // $orders->transform(function($order, $key){
        //     $order->cart = unserialize($order->cart);

        //     return $order;
        // });

        $output = '<link rel="stylesheet" href="style.css">
        <h2 style=" color:Blue;text-align:center"> Facture <table >
                        <table class="table">
                            <thead class="thead">
                                <tr class="text-left">
                                <th class="image-prod"><img src="storage/users/default.png" alt="" style = "height: 80px; width: 80px;"></th>
                                    <th>Client Name : ' . Auth::user()->name . '<br> Client Address : ' . Auth::user()->email . ' <br> Date : ' . Auth::user()->created_at . '</th>
                                </tr>
                            </thead>
                        </table>
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Image</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>';


        foreach (cart::content() as $item) {

            $output .= '<tr class="text-center">
                                <td class="image-prod">
                                <img src="storage/product/img' . $item->id . '.jpg" alt="test" style = "height: 80px; width: 80px;">
                                </td>
                                <td class="product-name">
                                    <h3>' . $item->name . '</h3>
                                </td>
                                <td class="price">$ ' . $item->price . 'Fcfa </td>
                                <td class="qty">' . $item->qty . '</td>
                                <td class="total">$ ' . $item->price * $item->qty . 'Fcfa </td>
                            </tr><!-- END TR-->
                            </tbody>';

            $output .= "";
        }

        $totalPrice = cart::total();



        $output .= '</table>';

        $output .= '<table class="table">
                        <thead class="thead">
                            <tr class="text-center">
                                    <th>Total</th>
                                    <th style="color:red">' . $totalPrice . 'Fcfa </th>
                            </tr>
                        </thead>
                    </table>';


        return $output;
    }
}
