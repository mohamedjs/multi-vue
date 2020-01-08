<?php

namespace App\Models;

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
     return $value ? $value : url('/images/user-03.jpg') ;
   }

    public function products()
    {
      return $this->hasMany('App\Models\Product','brand_id','id');
    }
}
