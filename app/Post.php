<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $fillable = ['published_date','active','url','product_id','operator_id','user_id'];


  public function operator()
  {
    return $this->belongsTo('App\Operator','operator_id','id');
  }

  public function product()
  {
    return $this->belongsTo('App\Product','product_id','id');
  }

  public function user()
  {
    return $this->belongsTo('App\User','user_id','id');
  }
}
