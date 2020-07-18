<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * @var AuthService
     */
    private $authService;


    /**
     * LoginController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function form()
    {
        return view("admin.auth.login");
    }

    public function attempt(LoginRequest $request)
    {
        if (!$this->authService->attempt($request)) {
            return back()->withInput($request->all())->with("error", "In valid credential");
        }

        if(auth()->user()->type == 3){
          return back()->withInput($request->all())->with("error", "In valid credential");
        }

        return redirect(route("admin.home.index"));
    }
}
