<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class  ContactUs extends Model
{
    protected $fillable = ["user_id", "email", "subject", "message" , "phone"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
