<?php
namespace App\Http\Controllers\Api\Admin;

use App\Http\Requests\Api\Admin\LoginAttemptRequest;
use App\Http\Requests\Api\Admin\ForgetPasswordRequest;
use App\Http\Requests\Api\Admin\ResetPasswordRequest;
use App\Http\Requests\Api\Admin\VerifyRequest;
use App\Http\Requests\Api\Admin\UpdatePasswordRequest;
use App\Http\Controllers\Api\APIController;
use App\Http\Services\AuthService;
use App\Http\Services\UserService;
use App\Http\Repository\UserRepository;
use App\Http\Resources\UserResource;

class AuthController extends APIController
{
    /**
     * @var AuthService
     */
    private $authService;
    /**
     * @var UserService
     */
    private $userService;
    /**
     * @var userRepository
     */
    private $userRepository;
    /**
     * AuthController constructor.
     * @param AuthService $authService
     * @param UserService $userService
     * @param userRepository $userRepository
     */
    public function __construct(AuthService $authService, UserRepository $userRepository, UserService $userService)
    {
        $this->authService    = $authService;
        $this->userRepository = $userRepository;
        $this->userService    = $userService;
    }
    /**
     * Login user and create token
     * generate toen and put it in cookie with expired date and send it befor each request in middlware called:addAuthTokenHeader
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
     * @return [response] Success Message
     */
    public function logout()
    {
        auth()->user()->update(['api_token' => '' , 'expired_token' => null]);
        cookie()->forget(env("AUTH_COOKIE_NAME"));
        return $this->OK('logout successfull!');
    }
    
    /**
     * forgetPassword
     * forget password mannulay about way send link to user with his email & token that are generate in table passsword_resets
     * @param  ForgetPasswordRequest $request (email)
     * @return response
     */
    public function forgetPassword(ForgetPasswordRequest $request)
    {
      $user           = $this->userRepository->search($request)->first();
      $token          = \Str::random(80);
      $user->sendPasswordResetNotification($token);
      return $this->OK([],'Reset Password Link Send To Email Successfully');
    }
    
    /**
     * resetPassword
     * reset password about way check data in reset link that's send to user
     * @param  ResetPasswordRequest $request (password, confirmPasssword, email)
     * @return LoginFunction
     */
    public function resetPassword(ResetPasswordRequest $request)
    {
      $user           = $this->userRepository->search($request)->first();
      $attempt        = $this->authService->resetPassword($user,$request);
      return $this->Login($attempt);
    }  
    /**
     * sendVerifyEmail
     * send email to user that can with it verify his email , link contain hash email , hash userId
     * @return Response (array, successMessage)
     */
    public function sendVerifyEmail()
    {
      auth()->user()->sendEmailVerificationNotification();
      return $this->OK([],'Verifycation Email Send SuccessFully');
    }
    /**
     * verifyEmail
     * check email and user id that's in verify link (userId,email)
     * @param  VerifyRequest $request (hashEmail, hashUserid)
     * @return Response (userResource, successMessage)
     */
    public function verifyEmail(VerifyRequest $request)
    {
        $request->merge(['email_verified_at' => now()]);
        $user = $this->userService->fill($request, auth()->user());
        return $this->OK(new UserResource($user), 'Email Verified SuccessFully');
    }
    /**
     * updatePassword
     * compare old password with newPassword with hash
     * @param  UpdatePasswordRequest $request (oldPassword, password, confirmPassword)
     * @return Response (successMessage)
     */
    public function updatePassword(UpdatePasswordRequest $request)
    {
      $this->userService->fill($request, auth()->user());
      return $this->OK([],'Update Password SuccessFully');
    }
    /**
     * getCookie
     * generate cookie with  access_token, token, with time
     * @param  mixed $token
     * @param  mixed $time
     * @return cookie
     */
    private function getCookie($token,$time)
    {
      return cookie(
            env('AUTH_COOKIE_NAME'),
            $token,
            $time*24*60
      );
    }
}
