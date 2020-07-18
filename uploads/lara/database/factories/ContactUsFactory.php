<?php

/** @var Factory $factory */

use App\Constants\Status;
use App\Models\ContactUs;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(ContactUs::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'subject' => $faker->text(10),
        'message' => $faker->text(500),
        'phone' => $faker->phoneNumber,
        'user_id' => User::inRandomOrder()->first()
    ];
});
