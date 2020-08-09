<?php

use App\Models\Post;
use App\Models\User;
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
Route::post('auth/user',UserRegisterController::class);
Route::get('/post',function(){
    // $memory_usage = memory_get_usage();
    // echo round($memory_usage / 1024 /1024 ).'<br>';

    $postSubQuery = Post::select('approved_at')->whereColumn('user_id', 'users.id');
    $users        = User::select('users.*')->selectSub($postSubQuery, 'approved_at')->get();

    return $users;

    foreach($users as $user){
        $user->activated_at;
    }

    // $users = User::get();
    // $users->load('posts');

    // foreach($users as $user){
    //     $user->posts->first()->approved_at;
    // }

    // $memory_usage = memory_get_usage() - $memory_usage;
    // echo round($memory_usage / 1024 /1024 ).'<br>';
});