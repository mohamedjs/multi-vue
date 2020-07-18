<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  protected $fillable = [
      'name', 'address', 'active' ,'area_id'
  ];

  protected $appends = ["is_favorite"];

  public function getIsFavoriteAttribute()
  {
      if (Auth::check()) {
          $user = $this->usersFavorites()->where("user_id", "=", Auth::id())->first();

          return isset($user);
      }

      return false;
  }

  public function categorys()
  {
      return $this->belongsToMany(Category::class, 'category_providers', 'provider_id', 'category_id');
  }
  public function area()
  {
      return $this->belongsTo(Area::class);
  }
  public function demands()
  {
      return $this->hasMany(Demand::class);
  }

  public function usersFavorites() {
      return $this->belongsToMany(User::class, "user_provider");
  }

}
