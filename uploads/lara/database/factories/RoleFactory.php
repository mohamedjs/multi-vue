<?php

use Faker\Generator as Faker;
use App\Models\Role;
use Faker\Factory;
/** @var \Illuminate\Database\Eloquent\Factory $factory */

$factory->define(Role::class, function (Faker $faker) {
    $roles = [
        'active' => $faker->boolean,
        'name' => $faker->word,
    ];

    return $roles;
});
