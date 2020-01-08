<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'coupon' ,'value' , 'expire_date' , 'user_id' , 'used'
    ];

    public function getUsedAttribute($value){
        if($value == 1){
            return 'Recerve To Client But Not Used yet';
        }
        if($value == 2){
            return  'Used';
        }
        return 'not used';
    }

    public function client()
    {
      return $this->belongsTo('App\User');
    }
}
