<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker){
    return [
        'published_date' => date('Y-m-d'),
        'active' => 1,
        'url' => '#',
        'product_id' => App\Models\Product::inRandomOrder()->get()[0],
        'operator_id' => App\Models\Operator::inRandomOrder()->get()[0],
        'user_id'=> App\User::inRandomOrder()->get()[0]
    ];
});
