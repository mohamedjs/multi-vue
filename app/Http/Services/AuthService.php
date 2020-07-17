<?php
/**
 * Created by PhpStorm.
 * User: yehia
 * Date: 13/06/19
 * Time: 12:57 م
 */

namespace App\Http\Services;

use App\Models\User;
use App\Http\Services\UserService;
use App\Http\Requests\Api\Admin\LoginAttemptRequest;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthService
{
    /**
     * @var UserService
     */
    private $userService;

    /**
     * AuthService constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function attempt(Request $request)
    {
        return Auth::attempt(
            ['email' => $request->email, "password" => $request->password]
        );
    }

    public function resetPassword(User $user,Request $request)
    {
      $newPassword = $request->password;
      $user->password = $request->password;
      $user->save();
      $request = new LoginAttemptRequest();
      $request->replace(['email' => $user->email , 'password' => $newPassword , 'checkbox_remember_me' => false]);
      return $request;
    }

    public function generateApiToken(User $user , $expired_token) : User
    {
        $user->api_token = \Str::random(80);

        $user->expired_token = \Carbon\Carbon::now()->addDays($expired_token)->format('Y-m-d');

        $user->save();

        return $user;
    }

}
