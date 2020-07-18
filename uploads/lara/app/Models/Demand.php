<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    protected $fillable = ["user_id", "admin_id", "provider_id", "name", "phone" , "note", "status" , "price" , "price_after_discount","fawry_number"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function managers()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function items()
    {
        return $this->hasMany(DemandDetails::class);
    }

    public function sum_amount()
    {
        return $this->hasMany(Payment::class , 'request_id')->sum('amount');
    }
}
