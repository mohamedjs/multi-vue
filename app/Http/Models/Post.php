<?php

namespace App\Models;

use App\Traits\FetshesApprove;
use App\Traits\CanBeFiltered;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{    
    use FetshesApprove, CanBeFiltered;
    /**
     * fillable
     * for declar attrubuite in tables
     * @var array
     */
    protected $fillable = [
        'title',
        'body',
        'approved_at',
    ];
    
    /**
     * dates
     * declar attrubites that use carbon date
     * @var array
     */
    protected $dates = [
        'approved_at'
    ];

    public static function boot()
    {
        Parent::boot();

        Static::addGlobalScope('approved',function($query){
            return $query->whereNotNull('approved_at');
        });

        // we can define class and put function apply their and use it as globale scope and if we need to call it just right class name
        // Static::addGlobalScope(new class approved implements scope {
        //     public function apply(Builder $builder,Model $model)
        //     {
        //         return $query->whereNotNull('approved_at');
        //     }
        // });
    }

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault(function($user) {
            // $user->name = "Guest";
            $user->fill(
                factory(User::class)->make()->toArray()
            );
        });
    }
}
