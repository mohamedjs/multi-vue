<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Http\Requests\Admin\RoleRequest;
use App\Http\Services\RoleService;
use App\Http\Services\RolePermissionService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RoleController extends Controller
{
    protected $roleService;
    protected $rolePermissionService;
    protected $roleRepository;

    public function __construct(RoleService $roleService, RolePermissionService $rolePermissionService, RoleRepository $roleRepository)
    {
        //$this->authorizeResource(Role::class, "role");
        $this->roleService = $roleService;
        $this->rolePermissionService = $rolePermissionService;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @param Request $request
     * @return Factory|View
     * @throws AuthorizationException
     */
    public function index(Request $request)
    {
        $this->authorize("index", Role::class);
        $roles = Role::query()->paginate(10);
        $roles->appends($request->all());

        return view("admin.roles.index", compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        $this->roleService->fillFromRequest($request);

        return redirect(route('admin.roles.index'))->with('success', trans('Role added successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', ['role' => $role]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RoleRequest $request
     * @param Role $role
     * @return Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        $this->roleService->fillFromRequest($request, $role);
        return redirect(route('admin.roles.index'))->with('success', trans('Role updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return Response
     * @throws Exception
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->back()->with('success', trans('Role deleted successfully'));
    }
}
