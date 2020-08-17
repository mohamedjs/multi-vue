<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class BodyFilter implements Filter
{    
    /**
     * apply
     *
     * @param  Builder $builder
     * @param  Array $value
     * @return Buillder for this specific search
     */
    public function apply(Builder $builder, $value)
    {
        return $builder->where('body', $value);
    }
}