<?php

namespace App\Http\Controllers;

use App\Filters\EmailFilter;
use App\Filters\NameFilter;
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
	      'phone' => new PhoneFilter,
	      'user_name'=> new UserNamelFilter, 
	      'bod'=> new BirthOfDateFilter, 
	      'status'=> new StatusFilter, 
	      'gender'=> new GenderFilter, 
	      'user_type'=> new UserTypeFilter, 
	      'home_phone'=> new HomePhoneFilter, 
	      'website'=> new WebsiteFilter, 
	      'email_verified_at'=> new VerifiedFilter, 
	    ];
	 }
}
