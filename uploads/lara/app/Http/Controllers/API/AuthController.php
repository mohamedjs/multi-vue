<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;
use App\Http\Services\AuthService;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends APIController
{
    /**
     * @var AuthService
     */
    private $authService;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        $user = User::query()
            ->where('email', '=', $request->input("identifier"))
            ->orWhere("phone", "=", $request->input("identifier"))
            ->first();

        if (!$user) {
            return $this->error("Email or Phone not correct", (object)[]);
        }

        if (!$this->authService->attempt($request)) {
            return $this->error("Invalid password", (object)[]);
        }

        return $this->OK($this->authService->generateApiToken(Auth::user()));
    }

    public function register(RegisterRequest $request)
    {
        $request->merge(["active" => 1]);

        $user = $this->authService->register($request) ;

        return $this->OK($this->authService->generateApiToken($user));
    }
}
