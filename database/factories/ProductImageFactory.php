<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ProductImage::class, function (Faker $faker) use ($path){
    return [
        'product_id' => App\Models\Product::inRandomOrder()->first(),
        'image'  => $faker->imageUrl()
    ];
});
