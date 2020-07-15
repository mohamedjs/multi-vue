<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    { 
        factory(User::class)->create([
            "name" => "Mohamed",
            "user_name" => "Mahmoud",
            "email" => "admin@multivue.com",
            "password" => "secret",
            "api_token" => "gftVCeSTKNypCvTLltAlpTWIqp8sqC9QUsRkguRSjfKlCqlbr6YagkCBAY9DRkNpkQULaFwDnmkKTuxT",
        ]);

        factory(User::class, 10)->create();
    }
}