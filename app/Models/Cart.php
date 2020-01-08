<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = "carts";
    protected $fillable = [
        'product_id' , 'user_id' , 'quantity' , 'price' , 'total_price'
    ];
    public function sub_total()
    {
      return (int)Cart::where('user_id',\Auth::guard('client')->user()->id)->sum('total_price');
    }
    public function getTotalPriceAttribute($value){
      return (int) $value;
    }
    public function getPriceAttribute($value){
      return (int) $value;
    }
}
