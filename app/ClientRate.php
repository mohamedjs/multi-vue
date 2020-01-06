<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientRate extends Model
{
    protected $fillable = ['product_id', 'client_id', 'rate' , 'comment' , 'publish'];
}
