<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;

class Stat extends Component
{
    public $totalUser,$totalProduct, $totalCategory;
    public function render()
    {
        $this->totalUser=count(User::all());
        $this->totalProduct=count(Product::all());
        $this->totalCategory=count(Category::all());
        return view('livewire.admin.stat',);
    }
}
