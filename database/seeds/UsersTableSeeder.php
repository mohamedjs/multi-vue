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

        factory(User::class, 3)->state('male')->state('active')->state('client')->create();
        factory(User::class, 3)->state('female')->state('disabled')->state('client')->create();
        factory(User::class, 3)->state('male')->state('disabled')->state('admin')->create();
        factory(User::class, 3)->state('verified')->state('male')->state('active')->state('admin')->create();
        factory(User::class, 3)->state('male')->state('active')->state('staff')->create();
    }
}