<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id' , 'address_id' , 'shipping_amount' , 'status' , 'total_price','lang','payment'
    ];

    public function getTotalPriceAttribute($value){
      return (int) $value;
    }
    public function getStatusAttribute($value){
        if($value == 1){
            $value = __('front.admin_status.pending');
        }
        if($value == 2){
            $value = __('front.admin_status.under_shipping');
        }
        if($value == 3){
            $value = 'Finshed';
        }
        return $value;
    }

    public function getPaymentAttribute($value){
        if($value == 1){
            $value = __('front.cash');
        }
        if($value == 2){
            $value = __('front.visa');
        }
        if($value == 3){
            $value = __('front.visa_after_deliver');
        }
        return $value;
    }

    public function products()
    {
      return $this->hasMany('App\Models\OrderDetail');
    }
    public function client()
    {
      return $this->belongsTo('App\User');
    }
    public function address()
    {
      return $this->belongsTo('App\Models\UserAddress','address_id');
    }

    public function sum()
    {
        return (int) \App\Models\OrderDetail::where('order_id',$this->id)->sum('total_price');
    }
}
