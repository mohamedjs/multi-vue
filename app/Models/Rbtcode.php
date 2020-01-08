<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RbtCode extends Model
{
    protected $fillable = ['content_id','operator_id','rbt_code'];

    public function operator()
    {
      return $this->belongsTo('App\Models\Operator','operator_id','id');
    }

    public function content()
    {
      return $this->belongsTo('App\Models\Content','content_id','id');
    }


}
