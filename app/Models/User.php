<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\Filterable;
use App\Traits\LatestState;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, Filterable, LatestState;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'user_name', 'bod', 'status', 'gender', 'user_type', 'home_phone', 'website', 'verified', 'email_verified_at', 'api_token', 'expired_token', 'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @param $pass
     */
    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = bcrypt($pass);
    }
    
    public function getAuthPassword()
    {
        return $this->password;
    }
}
