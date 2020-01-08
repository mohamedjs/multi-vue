<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRate extends Model
{
    protected $fillable = ['product_id', 'user_id', 'rate' , 'comment' , 'publish'];
}
