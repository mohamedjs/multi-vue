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
Route::get('/{any?}', 'ApplicationController')->where('any', '.*')->fallback();
// Route::prefix('admin/v1')->group(function () {
//     Route::middleware(['auth'])->group(function () {
//         Route::get('/{any?}', 'ApplicationController')->where('any', '.*')->fallback();
//     });
// });
// Auth::routes();
