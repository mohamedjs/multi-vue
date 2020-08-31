<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use  App\Http\Filters\Filter;

class GlobalSearch implements Filter
{   
    public $seachColumn;

    public function __construct($seachColumn)
    {
        $this->seachColumn = $seachColumn;
    }
    /**
     * apply
     *
     * @param  Builder $builder
     * @param  string $value
     * @return Buillder for this specific search
     */
    public function apply(Builder $builder, $value)
    {
        return $builder->whereLike($this->seachColumn, $value);
    }
}