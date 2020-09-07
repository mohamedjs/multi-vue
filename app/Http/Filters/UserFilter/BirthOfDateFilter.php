<?php

namespace App\Http\Filters\UserFilter;

use Illuminate\Database\Eloquent\Builder;
use  App\Http\Filters\Filter;

class BirthOfDateFilter implements Filter
{    
    /**
     * apply
     *
     * @param  Builder $builder
     * @param  string $value
     * @return Buillder for this specific search
     */
    public function apply(Builder $builder, $value)
    {
        $builder->where('bod', '=', date('Y-m-d',strtotime($value)));
    }
}