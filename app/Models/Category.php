<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Translatable;
class Category extends Model
{
  use  Translatable;
  protected $table = 'categories';
  protected $fillable = ['title','image', 'coding' ,'parent_id'];
  ///////////////////set image///////////////////////////////
  // public function setImageAttribute($value){
  //   if(is_file($value)){
  //       $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
  //       $path     = '/uploads/category/'.date('Y-m-d').'/';
  //       $value->move(base_path($path),$img_name);
  //       $this->attributes['image']= $path.$img_name ;
  //   }
  //   else{
  //       $this->attributes['image']= $value ;
  //   }
  // }
  //
     public function getImageAttribute($value)
     {
       return $value ? $value : url('/images/avatar-s-1.png') ;
     }



  public function products()
  {
    return $this->hasMany('App\Models\Product','category_id','id');
  }

  public function sub_cats()
  {
    return $this->hasMany('App\Models\Category','parent_id','id');
  }

  public function cat()
  {
    return $this->belongsTo('App\Models\Category','parent_id','id');
  }

}
