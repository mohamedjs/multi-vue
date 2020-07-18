<?php

namespace App\Repositories;

use App\Models\Role;
use Symfony\Component\HttpFoundation\Request;

class RoleRepository
{
    public function search(Request $request)
    {
        $roles = Role::query()->orderByDesc("id");

        if ($request->has('name') && !empty($request->get('name'))) {
            $roles->where('name', 'like', '%' . $request->query->get('name') . '%');
        }

        return $roles;
    }
}
