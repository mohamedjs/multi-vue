<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register MyRoute routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "myRoute" middleware group. Enjoy building your API!
|
*/

Route::resource('/posts','PostController');