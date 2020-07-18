<?php

namespace App\Http\Services;

use Symfony\Component\HttpFoundation\Request;

class RolePermissionService
{

    public function fillFromRequest(Request $request, $role = null)
    {
        if (!$role) {
            return false;
        }
        $role->permissions()->sync($request->input("permissions"));
        return $role;
    }
}
