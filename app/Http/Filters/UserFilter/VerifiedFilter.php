<?php

namespace App\Http\Filters\UserFilter;

use Illuminate\Database\Eloquent\Builder;
use  App\Http\Filters\Filter;

class VerifiedFilter implements Filter
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
        return $value == 1 ? $builder->whereNotNull('email_verified_at') : $builder->whereNull('email_verified_at');
    }
}