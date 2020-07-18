<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = [
      'name', 'active'
  ];

  public function providers()
  {
      return $this->belongsToMany(Provider::class, 'category_providers', 'provider_id' , 'category_id');
  }

}
