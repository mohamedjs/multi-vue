<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@insurance.com',
            'type' => 1
        ]);

//        factory(User::class, 15)->create();
    }
}
