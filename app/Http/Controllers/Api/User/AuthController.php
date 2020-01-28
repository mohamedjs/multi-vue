<?php
namespace App\Http\Controllers\Api\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use App\User;
use Validator;
class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
        'firebase_token' => '',
        'device_id' => ''
      ]);


      if($validator->fails()){
        return response()->json([
          'message' => 'Unsuccessfully created user!' ,
          'status' => 'faild' ,
          'data' => $validator->errors()
        ]);
      }

      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
        'user_type' => 4
      ]);
      $api_token = $user->createToken('Personal Access Token');
      $api_token->token->expires_at = Carbon::now()->addWeeks(1);
      $user['accessToken'] = $api_token->accessToken;
      $user['expaired_token'] = $api_token->token->expires_at->format('d/m/Y');

        return response()->json([
          'message' => 'Successfully created user!' ,
          'status' => 'success' ,
          'data' => $user
        ]);
    }

    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'email' => 'required|email',
        'password' => 'required',
      ]);


      if($validator->fails()){
        return response()->json([
          'message' => 'Unsuccessfully created user!' ,
          'status' => 'faild' ,
          'data' => $validator->errors()
        ]);
      }
      $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
          return response()->json([
            'message' => 'unauthorized user!' ,
            'status' => 'faild' ,
            'data' => (object) []
          ]);
      }

      $user = Auth::user();
      if($user->type != 4){
        return response()->json([
          'message' => 'unauthorized user!' ,
          'status' => 'faild' ,
          'data' => (object) []
        ]);
      }
      $api_token = $user->createToken('Personal Access Token');
      $api_token->token->expires_at = Carbon::now()->addWeeks(1);
      $data['token']       = $api_token->accessToken;
      return response()->json(['message' => 'authorized user!' , 'status' => 'success' , 'data' => $data])->withCookie($cookie);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout()
    {
        Auth::user()->token()->revoke();
        return response()->json(['message' => 'Successfully Log Out!' , 'status' => 'success' , 'data' => (object) [] ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user()
    {
        return response()->json(['message' => 'Successfully created user!' , 'status' => 'ok' , 'data' => Auth::user()]);
    }

    private function getCookie($token)
    {
      return cookie(
            env('AUTH_COOKIE_NAME'),
            $token,
            45000
        );
    }
}
