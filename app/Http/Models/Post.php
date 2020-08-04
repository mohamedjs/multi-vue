<?php

namespace App\Models;

use App\Traits\FetshesApprove;
use App\Traits\CanBeFiltered;
use Illuminate\Database\Eloquent\Builder;
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
        'image',
        'user_id'
    ];
    
    /**
     * dates
     * declar attrubites that use carbon date
     * @var array
     */
    protected $dates = [
        'approved_at'
    ];
}
