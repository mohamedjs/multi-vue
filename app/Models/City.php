<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'shipping_amount' , 'state_id'];

    public function state()
    {
        return $this->belongsTo('App\Models\State','state_id');
    }

    public function clients()
    {
        return $this->belongsToMany('App\User','client_addresses','city_id','user_id')
        ->withPivot('id','address','details')->withTimestamps();
    }

    public function getShippingAmountAttribute($value){
      return (int) $value;
    }
}
