<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone', 'active', 'gender', 'type' , 'area_id', 'device_token'
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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id');
    }

    public function hasAccess($permission): bool
    {
        $userPermissions = $this->permissions();

        return in_array($permission, $userPermissions);
    }

    public function permissions() : array
    {
        $permissions = $this->query()
            ->join("user_roles", "users.id", "=", "user_roles.user_id")
            ->join("roles", "user_roles.role_id", "=", "roles.id")
            ->join("role_permission", "roles.id", "=", "role_permission.role_id")
            ->join("permissions", "role_permission.permission_id", "=", "permissions.id")
            ->select("permissions.identifier")
            ->where("users.id", "=", auth()->id())
            ->distinct()
            ->get();

        $permissionsIdentifier = [];
        foreach ($permissions as $permission) {
            $permissionsIdentifier[] = $permission["identifier"];
        }

        return $permissionsIdentifier;
    }

    public function isTypeOf($userType)
    {
        return ($this->type == $userType);
    }


    public function providers()
    {
        return $this->belongsToMany(Provider::class, "user_provider");
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function demands()
    {
        return $this->hasMany(Demand::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class)->latest('notifications.created_at');
    }

    public function unread_notify()
    {
        return $this->hasMany(Notification::class , 'user_id')->where('seen', 0)->latest('notifications.created_at');
    }

    public function sum_amount()
    {
        return $this->hasMany(Payment::class , 'user_id')->sum('amount');
    }


    public function manageDemands()
    {
        return $this->belongsToMany(Demand::class);
    }
}
