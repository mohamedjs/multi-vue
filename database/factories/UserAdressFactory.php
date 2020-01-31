<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserAddress::class, function (Faker $faker){
    return [
        'address' => $faker->text(random_int(30,100)),
        'city_id' => App\Models\City::inRandomOrder()->first(),
        'user_id' => App\User::inRandomOrder()->first(),
    ];
});
