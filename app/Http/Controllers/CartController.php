<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Facades\Session as FacadesSession;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


         return view('Cart.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $duplicata= Cart::search(function ($cartItem,$row) use($request)
        {
            return $cartItem->id === $request->product_id;
        });
        if($duplicata->isNotEmpty())
        {
            return redirect()->route('products.index')->with('success'," Le produit a déjà  été ajouté");
        }
        Toastr::success('<i class="fa fa-check"></i>Le produit a bien été ajouté au panier ', 'Success!!');

             $product=Product::find($request->product_id);
            Cart::add($product->id,$product->title,1,$product->price)
            ->associate('Product');

            // return redirect()->route('products.index')->with('success',"Le produit a bien été ajouté");
            return redirect()->route('products.index');

        // return redirect()->route('products.index')->with('success'," Le produit a déjà  été ajouté");

    }



    /**
     * Update the specified resource in storage.

     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|numeric|between:1,5'
        ]);

        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
            return response()->json(['success' => false], 400);
        }

        if ($request->quantity > $request->productQuantity) {
            session()->flash('errors', collect(['We currently do not have enough items in stock.']));
            return response()->json(['success' => false], 400);
        }

        Cart::update($rowId, $request->quantity);
        session()->flash('success_message', 'Quantity was updated successfully!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        Toastr::warning('<i class="fa fa-check"></i>Le produit à été supprimé du panier avec succès ', 'warning!!');
        return back()->with('danger');
    }
}
