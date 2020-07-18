<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Provider;
use App\Models\Area;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Provider::class, function (Faker $faker) {
    return [
        "name" => $faker->text(8),
        "address" => $faker->address,
        "active" => $faker->randomElement([1, 0]),
        'image' => $faker->imageUrl(),
        'area_id' => Area::inRandomOrder()->first()
    ];
});
