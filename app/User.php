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
        'name', 'email', 'password','image','phone','user_name','bod','status','gender' , 'user_type' , 'home_phone' ,'website'
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
      return $this->hasMany('App\Models\Post','user_id','id');
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

    public function cities()
    {
        return $this->belongsToMany('App\Models\City','client_addresses','user_id','city_id')
        ->withPivot('id','address','details')->withTimestamps();
    }

    public function rates()
    {
        return $this->belongsToMany('App\Models\Product','client_rates','user_id','product_id')
        ->withPivot('id', 'rate' , 'comment' , 'publish')->where('publish','=', 1)->withTimestamps();
    }

    public function carts()
    {
        return $this->belongsToMany('App\Models\Product','carts','user_id','product_id')
        ->withPivot('id', 'quantity' , 'price' ,'total_price')->withTimestamps();
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order','user_id','id');
    }

    public function coupons()
    {
        return $this->hasMany('App\Models\Coupon','user_id','id')->where('used',1);
    }

}
