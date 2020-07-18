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
                "name" => "Categories List",
                "module" => "categories",
                "active" => true,
                "identifier" => "admin.categories.index",
            ],
            [
                "name" => "Create Category",
                "module" => "categories",
                "active" => true,
                "identifier" => "admin.categories.create",
            ],
            [
                "name" => "Edit Category",
                "module" => "categories",
                "active" => true,
                "identifier" => "admin.categories.edit",
            ],
            [
                "name" => "Delete Category",
                "module" => "categories",
                "active" => true,
                "identifier" => "admin.categories.destroy",
            ],
            [
                "name" => "countries List",
                "module" => "countries",
                "active" => true,
                "identifier" => "admin.countries.index",
            ],
            [
                "name" => "Create Country",
                "module" => "countries",
                "active" => true,
                "identifier" => "admin.countries.create",
            ],
            [
                "name" => "Edit Country",
                "module" => "countries",
                "active" => true,
                "identifier" => "admin.countries.edit",
            ],
            [
                "name" => "Delete Country",
                "module" => "countries",
                "active" => true,
                "identifier" => "admin.countries.destroy",
            ],
            [
                "name" => "Notification List",
                "module" => "notifications",
                "active" => true,
                "identifier" => "admin.notifications.index",
            ],
            [
                "name" => "Create Notification",
                "module" => "notifications",
                "active" => true,
                "identifier" => "admin.notifications.create",
            ],
            [
                "name" => "Edit Notification",
                "module" => "notifications",
                "active" => true,
                "identifier" => "admin.notifications.edit",
            ],
            [
                "name" => "Delete Notification",
                "module" => "notifications",
                "active" => true,
                "identifier" => "admin.notifications.destroy",
            ],
            [
                "name" => "Payments List",
                "module" => "payments",
                "active" => true,
                "identifier" => "admin.payments.index",
            ],
            [
                "name" => "Settings List",
                "module" => "settings",
                "active" => true,
                "identifier" => "admin.settings.index",
            ],
            [
                "name" => "Edit Setting",
                "module" => "settings",
                "active" => true,
                "identifier" => "admin.settings.edit",
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
            [
                "name" => "Cities List",
                "module" => "cities",
                "active" => true,
                "identifier" => "admin.cities.index",
            ],
            [
                "name" => "Create City",
                "module" => "cities",
                "active" => true,
                "identifier" => "admin.cities.create",
            ],
            [
                "name" => "Edit City",
                "module" => "cities",
                "active" => true,
                "identifier" => "admin.cities.edit",
            ],
            [
                "name" => "Delete City",
                "module" => "cities",
                "active" => true,
                "identifier" => "admin.cities.destroy",
            ],
            [
                "name" => "Areas List",
                "module" => "areas",
                "active" => true,
                "identifier" => "admin.areas.index",
            ],
            [
                "name" => "Create Area",
                "module" => "areas",
                "active" => true,
                "identifier" => "admin.areas.create",
            ],
            [
                "name" => "Edit Area",
                "module" => "areas",
                "active" => true,
                "identifier" => "admin.areas.edit",
            ],
            [
                "name" => "Delete Area",
                "module" => "areas",
                "active" => true,
                "identifier" => "admin.areas.destroy",
            ],
            [
                "name" => "Supports List",
                "module" => "Support",
                "active" => true,
                "identifier" => "admin.contact.us.index",
            ],
            [
                "name" => "View Support",
                "module" => "Support",
                "active" => true,
                "identifier" => "admin.contact.us.show",
            ],
            [
                "name" => "Delete Support",
                "module" => "Support",
                "active" => true,
                "identifier" => "admin.contact.us.destroy",
            ],
            [
                "name" => "Providers List",
                "module" => "providers",
                "active" => true,
                "identifier" => "admin.providers.index",
            ],
            [
                "name" => "Create Provider",
                "module" => "providers",
                "active" => true,
                "identifier" => "admin.providers.create",
            ],
            [
                "name" => "Edit Provider",
                "module" => "providers",
                "active" => true,
                "identifier" => "admin.providers.edit",
            ],
            [
                "name" => "Delete Provider",
                "module" => "providers",
                "active" => true,
                "identifier" => "admin.providers.destroy",
            ],
            [
                "name" => "Requests List",
                "module" => "Requests",
                "active" => true,
                "identifier" => "admin.demands.index",
            ],
            [
                "name" => "Show Request",
                "module" => "Requests",
                "active" => true,
                "identifier" => "admin.demands.show",
            ],
            [
                "name" => "Edit Request",
                "module" => "Requests",
                "active" => true,
                "identifier" => "admin.demands.edit",
            ],
            [
                "name" => "Delete Request",
                "module" => "Requests",
                "active" => true,
                "identifier" => "admin.demands.destroy",
            ],
            [
                "name" => "Assign Request to other",
                "module" => "Requests",
                "active" => true,
                "identifier" => "admin.demands.assignees.create",
            ],
            [
                "name" => "Assign Request to Himself",
                "module" => "Requests",
                "active" => true,
                "identifier" => "admin.demands.assignees.himself",
            ],
            [
                "name" => "Cities Report",
                "module" => "reports",
                "active" => true,
                "identifier" => "admin.reports.cities",
            ],
            [
                "name" => "Financial Report",
                "module" => "reports",
                "active" => true,
                "identifier" => "admin.reports.financials",
            ],
            [
                "name" => "Providers Report",
                "module" => "reports",
                "active" => true,
                "identifier" => "admin.reports.providers",
            ],
            [
                "name" => "Users Report",
                "module" => "reports",
                "active" => true,
                "identifier" => "admin.reports.users",
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
