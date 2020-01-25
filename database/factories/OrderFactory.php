<?php

use Faker\Generator as Faker;
$factory->define(App\Models\Order::class, function (Faker $faker){
    return [
        'user_id'  => 1 ,
        'address_id' => App\Models\UserAddress::inRandomOrder()->first() ,
        'shipping_amount' => 50,
        'status' => random_int(1, 3) ,
        'total_price' => 1200,
        'lang' => 'en',
        'payment' => random_int(1, 3),
        'created_at' => '20'.random_int(19,20).'-'.random_int(1, 10).'-26 12:47:36'
    ];
});
