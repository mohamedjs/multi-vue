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
  Route::post('register', 'AuthController@signup')->name('api.admin.auth.register');
  Route::post('login', 'AuthController@login')->name('api.admin.auth.login');
  Route::post('forget/password', 'AuthController@forgetPassword')->name('api.admin.auth.forget.password');
  Route::post('reset/password', 'AuthController@resetPassword')->name('api.admin.auth.reset.password');

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
  
  Route::middleware(['auth:api','api_cookie'])->group(function () {
    Route::resource('home','HomeController',['as' => 'admin']);
    Route::resource('user','UserController',['as' => 'admin']);
    Route::post('logout', 'AuthController@logout')->name('api.admin.logout');
    Route::post('send/verify/email', 'AuthController@sendVerifyEmail')->name('api.admin.send.verify.email');
    Route::post('verify/email', 'AuthController@verifyEmail')->name('api.admin.verify.email');
    Route::post('update/password', 'AuthController@updatePassword')->name('api.admin.update.passsword');
  });
});
