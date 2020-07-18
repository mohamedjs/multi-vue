<?php

/** @var Factory $factory */

use App\Constants\DemandStatus;
use App\Models\User;
use App\Models\Provider;
use App\Models\Demand;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Demand::class, function (Faker $faker) {
    return [
        'user_id' => User::query()->inRandomOrder()->first(),
        'provider_id' => Provider::query()->inRandomOrder()->first(),
        'status' => $faker->randomElement(array_keys(DemandStatus::getList())),
        'admin_id' => User::query()->find(1),
        "name" => $faker->name,
        "phone" => $faker->phoneNumber,
        "note"  => $faker->text,
    ];
});
