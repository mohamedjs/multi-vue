<?php

use App\Models\Permission;
use Illuminate\Database\Migrations\Migration;

class InsertPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $permissions = [
            [
                "name" => "Home",
                "module" => "home",
                "active" => true,
                "identifier" => "admin.home.index",
            ],
            [
                "name" => "Users List",
                "module" => "users",
                "active" => true,
                "identifier" => "admin.users.index",
            ],
            [
                "name" => "Admins List",
                "module" => "users",
                "active" => true,
                "identifier" => "admin.users.index.admin",
            ],
            [
                "name" => "Create User",
                "module" => "users",
                "active" => true,
                "identifier" => "admin.users.create",
            ],
            [
                "name" => "Edit User",
                "module" => "users",
                "active" => true,
                "identifier" => "admin.users.edit",
            ],
            [
                "name" => "Change User Password",
                "module" => "users",
                "active" => true,
                "identifier" => "admin.users.edit.password",
            ],
            [
                "name" => "Delete User",
                "module" => "users",
                "active" => true,
                "identifier" => "admin.users.destroy",
            ],
            [
                "name" => "Roles List",
                "module" => "roles",
                "active" => true,
                "identifier" => "admin.roles.index",
            ],
            [
                "name" => "Create Role",
                "module" => "roles",
                "active" => true,
                "identifier" => "admin.roles.create",
            ],
            [
                "name" => "Edit Role",
                "module" => "roles",
                "active" => true,
                "identifier" => "admin.roles.edit",
            ],
            [
                "name" => "Delete Role",
                "module" => "roles",
                "active" => true,
                "identifier" => "admin.roles.destroy",
            ],
            [
                "name" => "Role Permissions",
                "module" => "role",
                "active" => true,
                "identifier" => "admin.role.permissions.index",
            ],
        ];

        foreach ($permissions as $permission) {
            $permissionObj = new Permission($permission);
            $permissionObj->name = $permission['name'] ;
            $permissionObj->module = $permission['module'] ;
            $permissionObj->identifier = $permission['identifier'] ;
            $permissionObj->active = $permission['active'] ;
            $permissionObj->save();
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
