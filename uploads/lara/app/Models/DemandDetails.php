<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandDetails extends Model
{
  protected $fillable = [
      'demand_id', 'title'
  ];

  public function demand()
  {
    return $this->belongsTo(Demand::class);
  }
}
