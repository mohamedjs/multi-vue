<?php

use Faker\Generator as Faker;

$price = random_int(100,10000);
$factory->define(App\Models\Product::class, function (Faker $faker) use ($path,$price){
    return [
        'title' => $faker->text(random_int(5,12)) ,
        'description' =>$faker->text(random_int(30,1000)) ,
        'short_description' =>$faker->text(random_int(30,100)) ,
        'main_image' => $faker->imageUrl() ,
        'price' => $price,
        'special_price_type' => random_int(1,2),
        'special_price' => ($price - ($price * (15/100))),
        'special_price_start' => '2018-02-02',
        'special_price_end' => '2018-02-08',
        'meta_keyword' => $faker->text(random_int(30,100)) ,
        'meta_title'=> $faker->text(random_int(30,100)),
        'meta_description'=> $faker->text(random_int(30,100)),
        'sku'=> $faker->text(random_int(30,50)),
        'category_id'=> App\Models\Category::whereNotNull('parent_id')->inRandomOrder()->get()[0] ,
        'brand_id'=> App\Models\Brand::inRandomOrder()->get()[0] ,
        'special' => 1,
        'active' => 1,
    ];
});
