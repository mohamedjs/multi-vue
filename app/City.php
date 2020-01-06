<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'shipping_amount' , 'state_id'];

    public function state()
    {
        return $this->belongsTo('App\State','state_id');
    }

    public function clients()
    {
        return $this->belongsToMany('App\Client','client_addresses','city_id','client_id')
        ->withPivot('id','address','details')->withTimestamps();
    }

    public function getShippingAmountAttribute($value){
      return (int) $value;
    }
}
