<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Payment;
use App\Models\User;
use App\Models\Demand;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
        "amount" => rand(50,500),
        "payment_method" => $faker->randomElement([1,2]),
        'image' => $faker->imageUrl(),
        'request_id' => Demand::inRandomOrder()->first(),
        'user_id' => User::inRandomOrder()->first()
    ];
});
