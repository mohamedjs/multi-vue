<?php

namespace App\Models;
//use Illuminate\Database\Eloquent\ForceDeletes;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    //use ForceDeletes;
    protected $fillable = ['image' ,'product_id'];

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    public function setImageAttribute($value)
    {
        if(is_file($value))
        {
        $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
        $path     = '/uploads/product/'.date('Y-m-d').'/';
        $value->move(base_path($path),$img_name);
        $this->attributes['image']= $path.$img_name ;
        }
        else{
        $this->attributes['image']= $value ;
        }

    }

  public function getImageAttribute($value)
  {
    return url($value);
  }

  protected static function boot() {
    parent::boot();
        static::deleting(function($productimg) { // before delete() method call this
            if(file_exists(base_path('/uploads/product/'.basename($productimg->image))))
            {
                unlink(base_path('/uploads/product/'.basename($productimg->image))) ;
            }
       });
    }
}
