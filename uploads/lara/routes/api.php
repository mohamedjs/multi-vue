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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("")->namespace("API")->group(function () {
  Route::get('area','AreaController@index');
});
Route::prefix('v1')->namespace('API')->middleware('auth:api')->group(function () {
    Route::get("users/demands", "UserController@demands")->name("api.user.demands");
    Route::post("users/update", "UserController@update")->name("api.user.update");
    Route::post("users/provider/toggle", "UserController@toggleProvider")->name("api.user.toggle.provider");
    Route::post("users/photo/update", "UserController@updatePhoto")->name("api.user.photo.change");
    Route::post("users/password/update", "UserController@changePassword")->name("api.user.password.change");
    Route::post("users/device/token/update", "UserController@updateDeviceToken")->name("api.user.device.token.update");
    Route::resource('providers', 'ProviderController', ['as' => 'api'])->only('index');
    Route::resource('demands', 'DemandController', ['as' => 'api'])->only( "store", "index", "show");
    Route::post('demands/update/fawry', 'DemandController@updatefawry');
    Route::resource('contactUs', 'ContactUsController', ['as' => 'api'])->only('store');
    Route::resource('chat', 'ChatController', ['as' => 'api'])->only('index', 'store');
    Route::resource('payments', 'PaymentController', ['as' => 'api'])->only('store');
    Route::get("users/notify", "UserController@all_notification")->name("api.user.notify");
});

Route::prefix('v1')->namespace('API')->group(function () {
    Route::resource('users', 'UserController', ['as' => 'api'])->only('index', 'show');
//    Route::resource('countries', 'CountryController')->only('index');
    Route::resource('cities', 'CityController')->only('index');
    Route::resource('categories', 'CategoryController', ['as' => 'api'])->only('index', 'show');
    Route::post("register", 'AuthController@register')->name("api.auth.register");
    Route::post("login", 'AuthController@login')->name("api.auth.login");
    Route::post('forget/password','UserController@forGetPassword')->name('auth.user.forget.password');
    Route::resource('areas', 'AreaController')->only('index');
});
