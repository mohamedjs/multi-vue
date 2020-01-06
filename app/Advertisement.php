<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $fillable = ['image','ads_url'];

    ///////////////////set image///////////////////////////////
    // public function setImageAttribute($value){
    //     if(is_file($value)){
    //         $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
    //         $path     = '/uploads/ads/'.date('Y-m-d').'/';
    //         $value->move(base_path($path),$img_name);
    //         $this->attributes['image']= $path.$img_name ;
    //     }
    //     else{
    //         $this->attributes['image']= $value ;
    //     }
    // }

    public function getImageAttribute($value)
   {
     return $value ? $value : url('/images/avatar-s-1.png') ;
   }

    public function getAdsUrlAttribute($value)
    {
        if(isset($value)){
            return $value;
        }
        else{
            return '#';
        }

    }
}
