<?php

namespace App\Http\Controllers\Api;

use App\Events\UserWasRegisterd;
use App\Http\Controllers\Controller;
use App\Http\Repositories\UserRepository;
use App\Http\Requests\Api\UserRegisterFormRequest;
use App\Mail\ActivationSent;
use Mail;

class UserRegisterController extends Controller
{
    public  $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * when we call controller from  route this function work by default
     * 
     * @param UserRegisterFormRequest $request 
     * @return Response
     */

    public function __invoke(UserRegisterFormRequest $request)
    {
        $user = $this->user->create(
            array_merge($request->validated(),[
                'password' => bcrypt($request->password)
            ])
        );

        $token =  \Str::random(32);

        // Mail::to($user)->send(new ActivationSent($user, $token));

        event(new UserWasRegisterd($user, $token));

        return response()->json(null, 201);
    }
}
