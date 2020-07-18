<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::where('active', 1)->get();

        foreach ($permissions as $permission) {
            DB::table('role_permission')->insert([
                'role_id' => 1,
                'permission_id' => $permission->id,
            ]);
        }
    }
}
