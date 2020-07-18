<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Http\Services\RolePermissionService;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class RolePermissionController extends Controller
{
    protected $rolePermissionService;

    public function __construct(RolePermissionService $rolePermissionService)
    {
        $this->rolePermissionService = $rolePermissionService;
    }

    /**
     * @param Role $role
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function index(Role $role)
    {
        $this->authorize("index", RolePermission::class);

        $permissions = Permission::query()->where('active', 1)->get();
        $permissionsPerModule = [];

        foreach ($permissions as $permission) {
            $permissionsPerModule[$permission->module][] = $permission;
        }

        return view('admin.roles.permissions', ['permissionsPerModule' => $permissionsPerModule, 'role' => $role]);
    }

    public function store(Request $request, Role $role)
    {
        $this->rolePermissionService->fillFromRequest($request, $role);
        return redirect()->back()->with('success', trans('Permissions updated successfully'));
    }
}
