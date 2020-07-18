<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Chat;
use App\Models\User;
use App\Models\Demand;
use Faker\Generator as Faker;

$factory->define(Chat::class, function (Faker $faker) {
    return [
      'demand_id' => Demand::inRandomOrder()->first(),
      'user_id' => User::inRandomOrder()->first(),
      'message' => $faker->text(40)
    ];
});
