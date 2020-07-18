<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ["user_id", "message" ,"url" , "seen", "type", "demand_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
