<?php

/** @var Factory $factory */

use App\Models\Area;
use App\Models\City;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Area::class, function (Faker $faker) {
    $city = City::query()->inRandomOrder()->first();
    return [
        'city_id' => $city->id,
        'name' => $faker->city,
        'active' => $faker->randomElement([0, 1]),
    ];
});
