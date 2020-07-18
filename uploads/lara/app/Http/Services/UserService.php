<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    public function __construct(UploaderService $uploaderService)
    {
        $this->uploaderService = $uploaderService;
    }

    public function fill(Request $request, User $user = null)
    {
        if (!$user) {
            $user = new User();
        }

        $user->fill($request->all());

        $user->active = $request->input('active', false);

        $user->save();

        if ($request->hasFile("image")) {
            $this->updatePhoto($request, $user);
        }

        return $user;
    }

    public function updatePhoto(Request $request, User $user) {
        $user->image = $this->uploaderService->upload($request->file("image"), "users");
        $user->save();

        return true;
    }

    public function fillUserRolesFromRequest(Request $request, $user = null)
    {
        if (!$user) {
            return false;
        }
        $user->roles()->sync($request->input("roles"));

        return $user;
    }
}
