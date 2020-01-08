<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name', 'country_id'];

    public function country()
    {
      return $this->belongsTo('App\Models\Country','country_id','id');
    }
    public function cities()
    {
      return $this->hasMany('App\Models\City','governorate_id','id');
    }
}
