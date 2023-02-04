<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $guarded=[];
    use HasFactory;
    function getPrice()
{
    $price=$this->price/100;
    return number_format($price*100,2,',',' ')." €";
}
public function categories()
{
   return $this->belongsToMany(Category::class);
}



}
