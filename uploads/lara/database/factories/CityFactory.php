<?php

/** @var Factory $factory */

use App\Constants\Status;
use App\Models\City;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'active' => $faker->randomElement(array_keys(Status::getList())),

    ];
});
