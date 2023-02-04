<?php

namespace App\Http\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ListProduct extends Component
{
    public function render()
    {
        if (request()->categorie) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->categorie);
            })->paginate(6);
        } else {
            $products = Product::with('categories')->paginate(6);
        }
        return view('livewire.product.list-product',['products' => $products]);
    }


}

