<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryProvider extends Model
{
  protected $table = 'category_providers';
  protected $fillable = ['category_id', 'provider_id'];

  public function provider()
  {
    return $this->belongsTo(Provider::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

}
