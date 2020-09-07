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

        factory(User::class, 3)->states('male','active','client')->create();
        factory(User::class, 3)->states('female','disabled','client')->create();
        factory(User::class, 3)->states('male','disabled','admin')->create();
        factory(User::class, 3)->states('verified','male','active','admin')->create();
        factory(User::class, 3)->states('male','active','staff')->create();
    }
}