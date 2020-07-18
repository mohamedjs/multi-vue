<?php

namespace App\Http\Controllers\Admin;

use App\Http\Services\UserService;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserRolesController extends Controller
{

    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(User $user)
    {
        $roles = Role::where('active', '=', 1)->get();

        return view('admin.users.roles', ['roles' => $roles, 'user' => $user]);
    }

    public function store(Request $request, User $user)
    {
        $this->userService->fillUserRolesFromRequest($request, $user);

        return redirect()->back()->with('success', trans('Roles updated successfully'));
    }
}
