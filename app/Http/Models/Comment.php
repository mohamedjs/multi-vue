<?php

namespace App\Models;

use App\Traits\FetshesApprove;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use FetshesApprove;
    /**
     * fillable
     * for declar attrubuite in tables
     * @var array
     */
    protected $fillable = [
        'body',
        'user_id',
        'approved_at'
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
