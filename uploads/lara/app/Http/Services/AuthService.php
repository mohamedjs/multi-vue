<?php


namespace App\Http\Services;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
        $rememberMe = $request->filled('remember_me') ? true : false;
        $attempt =  Auth::attempt(
            [
                'email' => $request->request->get("identifier"),
                'password' => $request->request->get('password')
            ],
            $rememberMe
        ) ??
            Auth::attempt(
                [
                    'phone' => $request->request->get("identifier"),
                    'password' => $request->request->get('password')
                ],
                $rememberMe
            ) ;

        return $attempt;
    }

    /**
     * @param Request $request
     * @return User
     */
    public function register(Request $request)
    {
        return $this->userService->fill($request)->fresh();
    }


    public function generateApiToken(User $user) : User
    {
        $user->api_token = Str::random(80);
        $user->save();

        return $user;
    }
}
