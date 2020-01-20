<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProductImage::class, function (Faker $faker) use ($path){
    return [
        'product_id' => App\Models\Product::inRandomOrder()->get()[0],
        'image'  => $faker->imageUrl()
    ];
});
