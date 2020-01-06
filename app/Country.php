<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name','code','phonecode'];

    public function states()
    {
      return $this->hasMany('App\State','country_id','id');
    }
    public function operator()
    {
      return $this->hasMany('App\Operator','operator_id','id');
    }
}
