<?php

namespace App\Models;
//use Illuminate\Database\Eloquent\ForceDeletes;
use Illuminate\Database\Eloquent\Model;
//use App\Traits\Translatable;
class Product extends Model
{
    //use Translatable;
    protected $table="products";
  //use ForceDeletes;
  protected $fillable = ['title','main_image','price','special_price_type','special_price',
                        'special','active','description','short_description','special_price_end','special_price_start',
                        'meta_keyword','meta_title','meta_description','sku','category_id','brand_id','stock','min_stock'];
  public function getPriceAttribute($value){
    return (int) $value;
  }
  public function getPriceAfterDiscountAttribute($value){
    return (int) $value;
  }

  ///////////////////set image///////////////////////////////
  public function setMainImageAttribute($value)
  {
    if(is_file($value))
    {
      $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
      $path     = '/uploads/product/'.date('Y-m-d').'/';
      $value->move(base_path($path),$img_name);
      $this->attributes['main_image']= $path.$img_name ;
    }
    else{
      $this->attributes['main_image']= $value ;
    }

  }

  public function getMainImageAttribute($value)
  {
    return url($value);
  }

  public function category()
  {
    return $this->belongsTo('App\Models\Category','category_id','id');
  }

  public function brand()
  {
    return $this->belongsTo('App\Models\Brand','brand_id','id');
  }

  public function gallery()
  {
    return $this->hasMany('App\Models\ProductImage','product_id','id');
  }

  public function client_rates()
  {
      return $this->belongsToMany('App\User','client_rates','product_id','user_id')
      ->withPivot('id', 'rate' , 'comment' , 'publish')->where('publish','=', 1)->withTimestamps();
  }

  public function client_carts()
  {
      return $this->belongsToMany('App\User','carts','product_id','user_id')
      ->withPivot('id', 'quantity' , 'price' ,'total_price')->withTimestamps();
  }

  public function rate()
  {
    return round(\DB::table('client_rates')
        ->where('product_id',$this->id)
        ->avg('rate'));
  }

  protected static function boot() {
    parent::boot();
        static::deleting(function($product) { // before delete() method call this
            if(file_exists(base_path('/uploads/product/'.basename($product->main_image))))
            {
                unlink(base_path('/uploads/product/'.basename($product->main_image))) ;
            }
       });
    }
}
