<?php

use Faker\Generator as Faker;

$factory->define(App\Models\UserRate::class, function (Faker $faker){
    return [
        'rate'  => random_int(1,5),
        'comment' => $faker->text(random_int(10,30)),
        'publish' => 1,
        'product_id' => App\Models\Product::inRandomOrder()->get()[0],
        'user_id' => App\User::inRandomOrder()->get()[0]
    ];
});
