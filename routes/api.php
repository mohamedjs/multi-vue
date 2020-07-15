<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::prefix('v1')->namespace('Api\Admin')->group(function(){
  Route::post('register', 'AuthController@signup');
  Route::post('login', 'AuthController@login');
  Route::post('delete_all','Api\HomeController@delete_all');
  Route::get('items',function(){
    $array = [];
    $data['url'] = '/';
    $data['name'] = 'Home';
    $data['slug'] = 'home';
    $data['icon'] = 'HomeIcon';
    $data['i18n'] = 'home';
    array_push($array,(object)$data);
    $data['url'] = '/user';
    $data['name'] = 'Users';
    $data['slug'] = 'users';
    $data['icon'] = 'UsersIcon';
    $data['i18n'] = 'user';
    array_push($array,(object)$data);
    return $array;
  });
  Route::middleware('api_cookie')->group(function () {
    Route::resource('home','HomeController');
    Route::resource('user','UserController');
    Route::post('logout', 'AuthController@logout');
  });
});
