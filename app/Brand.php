<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;
class Brand extends Model
{
    use  Translatable;
    protected $table = 'brands';
    protected $fillable = ['title','image'];
    ///////////////////set image///////////////////////////////
    public function getImageAttribute($value)
   {
     return $value ? $value : url('/images/avatar-s-1.png') ;
   }

    public function products()
    {
      return $this->hasMany('App\Product','brand_id','id');
    }
}
