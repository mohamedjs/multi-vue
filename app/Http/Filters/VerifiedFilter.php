<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

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
        return $value ? $builder->whereNotNull('email_verified_at') : $builder->whereNull('email_verified_at');
    }
}