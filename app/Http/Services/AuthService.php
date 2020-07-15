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
            ['email' => $request->request->get("email"), "password" => $request->request->get("password")]
        );
    }

    public function changeUserPassword(Request $request, User $user)
    {
        if (!password_verify($request->input("old_password"), $user->password)) {
            return false;
        }

        $user->password = $request->input("password");
        $user->save();

        return true;

    }

    public function phoneLogin(Request $request)
    {
        $user = null;

        if ($request->has("user_id")) {
            $user = User::query()->find($request->input("user_id"));
        }

        if (!$user) {
            $user = User::query()->firstOrCreate($request->all());
        }

        return $user;
    }

    public function socialLogin(Request $request , User $user = null)
    {

        if ($request->has("email")) {
            $user = User::query()->where('email',$request->input("email"))->first();
        }

        if (!$user) {
            $user = $this->userService->fill($request, $user);
        }

        return $user;
    }

    public function generateApiToken(User $user , $expired_token) : User
    {
        $user->api_token = \Str::random(80);

        $user->expired_token = \Carbon\Carbon::now()->addDays($expired_token)->format('Y-m-d');

        $user->save();

        return $user;
    }

}
