<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = factory(Role::class, 1)->create(
                [
                'name'=>"Super Admin",
                'active' => 1,
                ],
                [
                    'name'=>"Admin",
                    'active' => 1,
                ]
            );
    }
}