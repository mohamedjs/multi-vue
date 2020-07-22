<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('password/reset/{token}','Auth\ResetPasswordController@reset')->name('password.reset');
Route::get('/{any?}', 'ApplicationController')->where('any', '.*')->fallback();
Route::get('email/verify/{id}/{hash}','ApplicationController')->name('verification.verify')->fallback();