<?php
namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Api\Admin\LoginAttemptRequest;
use App\Http\Requests\Api\Admin\ForgetPasswordRequest;
use App\Http\Requests\Api\Admin\ResetPasswordRequest;
use App\Http\Requests\Api\Admin\VerifyRequest;
use App\Http\Controllers\Api\APIController;
use App\Http\Services\AuthService;
use App\Http\Repository\UserRepository;
use App\Http\Resources\UserResource;

class AuthController extends APIController
{
     /**
     * @var AuthService
     */
    private $authService;
     /**
     * @var userRepository
     */
    private $userRepository;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService, UserRepository $userRepository)
    {
        $this->authService = $authService;
        $this->userRepository = $userRepository;
    }
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] userData
     * @return [string] expires_at
     */
    public function login(LoginAttemptRequest $request)
    {
      $expired_token = 1; //expired in one day

      if(!$this->authService->attempt($request)){
          return $this->error('unauthorized user!');
      }

      if($request->has('checkbox_remember_me') && $request->checkbox_remember_me){
        $expired_token = 7;  //if remember me expired in 7 days
      }

      $user = auth()->user();
      $user = $this->authService->generateApiToken($user,$expired_token);
      $cookie = $this->getCookie($user->api_token,$expired_token);
      $data['userData']       = new UserResource($user);
      $data['expaired_token'] = $user->expired_token;

      return response()->json(['data' => $data, 'message' => 'authorized user!', 'status' => true], 200)->withCookie($cookie);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout()
    {
        auth()->user()->update(['api_token' => '' , 'expired_token' => null]);
        cookie()->forget(env("AUTH_COOKIE_NAME"));
        return $this->OK('logout successfull!');
    }

    public function forgetPassword(ForgetPasswordRequest $request)
    {
      $user           = $this->userRepository->search($request)->first();
      $token          = \Str::random(80);
      $user->sendPasswordResetNotification($token);
      return $this->OK([],'Reset Password Link Send To Email Successfully');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
      $user           = $this->userRepository->search($request)->first();
      $attempt        = $this->authService->resetPassword($user,$request);
      return $this->Login($attempt);
    }

    public function sendVerifyEmail()
    {
      auth()->user()->sendEmailVerificationNotification();
      return $this->OK([],'Verifycation Email Send SuccessFully');
    }

    public function verifyEmail(VerifyRequest $request)
    {
        auth()->user()->update(['email_verified_at' => now()]); 
        $user= new UserResource(auth()->user());
        return $this->OK($user,'Email Verified SuccessFully');
    }

    private function getCookie($token,$time)
    {
      return cookie(
            env('AUTH_COOKIE_NAME'),
            $token,
            $time*24*60
        );
    }
}
