<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable = ['address', 'city_id', 'details' , 'user_id'];

    public function city()
    {
      return $this->belongsTo('App\Models\City','city_id');
    }
}
