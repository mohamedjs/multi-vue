<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
  protected $fillable = [
      'demand_id', 'user_id', 'message', 'comment' , 'type'
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function demand()
  {
    return $this->belongsTo(Demand::class);
  }
}
