<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['user_id', "request_id", "amount", "image", "transaction_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function demand()
    {
        return $this->belongsTo(Demand::class, "request_id", "id");
    }
}
