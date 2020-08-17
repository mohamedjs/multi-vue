<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class HomePhoneFilter implements Filter
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
        return $builder->where('home_phone', $value);
    }
}