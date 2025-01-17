<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
class User extends Authenticatable
{
    // use Notifiable,HasRoles;
    use Notifiable,HasApiTokens,HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','image','phone'
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

    public function posts()
    {
      return $this->hasMany('App\Post','user_id','id');
    }

    // public function setImageAttribute($value)
    // {
    //     if(is_file($value))
    //     {
    //     $img_name = time().rand(0,999).'.'.$value->getClientOriginalExtension();
    //     $path     = '/users/'.date('Y-m-d').'/';
    //     $value->move(public_path($path),$img_name);
    //     $this->attributes['image']= $path.$img_name ;
    //     }
    //     else{
    //     $this->attributes['image']= $value ;
    //     }
    //
    // }
    //
     public function getImageAttribute($value)
    {
      return $value ? $value : url('/images/user-03.jpg') ;
    }

}
