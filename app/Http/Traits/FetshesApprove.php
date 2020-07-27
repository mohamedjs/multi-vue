<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait FetshesApprove
{
    public function scopeApproved(Builder $builder)
    {
        $builder->whereNotNull('approved_at');
    }

    public function scopeDissapproved(Builder $builder)
    {
        $builder->whereNull('approved_at');
    }
}