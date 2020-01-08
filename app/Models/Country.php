<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','code','phonecode'];

    public function states()
    {
      return $this->hasMany('App\Models\State','country_id','id');
    }
    public function operator()
    {
      return $this->hasMany('App\Models\Operator','operator_id','id');
    }
}
