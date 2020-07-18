<?php

namespace App\Http\Services;

use App\Models\Role;
use Symfony\Component\HttpFoundation\Request;

class RoleService
{

    public function fillFromRequest(Request $request, $role = null)
    {
        if (!$role) {
            $role = new Role();
        }
        $role->fill($request->request->all());
        $role->active = $request->input("active", 0);
        $role->save();
        return $role;
    }

}
