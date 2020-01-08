<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id' , 'product_id' , 'quantity' , 'price' , 'total_price'
    ];

    public function getTotalPriceAttribute($value){
      return (int) $value;
    }
    public function getPriceAttribute($value){
      return (int) $value;
    }

    public function order()
    {
      return $this->belongsTo('App\Models\Order','order_id');
    }
    public function product()
    {
      return $this->belongsTo('App\Models\Product','product_id');
    }
}
