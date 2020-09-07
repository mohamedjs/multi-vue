<?php 

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;

class FromDateSearch implements Filter
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
    	$builder->where('created_at', '>=', date('Y-m-d',strtotime($value)));
    }
}
