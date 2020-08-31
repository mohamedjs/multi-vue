<?php

namespace App\Http\Controllers;

use App\Http\Filters\UserFilter\EmailFilter;
use App\Http\Filters\UserFilter\NameFilter;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /***
     * userFilters function that can with it filter user with some keys , shouid value of this keys instance from interface filer
     * @return array
     */
    protected function userFilters()
	{
	    return [
	      'name'  => new NameFilter,
	      'email' => new EmailFilter,
	    ];
	 }
}
