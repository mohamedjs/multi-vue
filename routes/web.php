<?php

use App\Message\Contracts\Message;
use App\Message\MessageStrategy;
use PhpOffice\PhpSpreadsheet\Writer\Ods\Content;

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
// Route::get('password/reset/{token}','Auth\ResetPasswordController@reset')->name('password.reset');
// Route::get('/{any?}', 'ApplicationController')->where('any', '.*')->fallback();
// Route::get('email/verify/{id}/{hash}','ApplicationController')->name('verification.verify')->fallback();



// o in s-o-l-i-d meand (open for extension, but closed for modification., polymorphism) , (ممكن ان ازود علية حاجة لكن معدلش فية)
Route::get('message/{service}',function($service){

    // $service = sprintf('App\\Message\\%sService',ucfirst($service));

    // dd(is_a($service, Message::class, true));

    // app()->bind(Message::class, $service);

    // dd(app(Message::class));

    app()->when(MessageStrategy::class)->needs(Message::class)->give(function() use ($service) {
        $service = sprintf('App\\Message\\%sService',ucfirst($service));
        return new $service;
    });

    dd(app(MessageStrategy::class));
    
});
