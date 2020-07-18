<?php

use App\Models\UserRole;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(UserRole::class)->create([
            'user_id' => 1,
            'role_id' => 1,

        ]);
    }
}
