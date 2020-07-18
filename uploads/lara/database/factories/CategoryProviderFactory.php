<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Provider;
use App\Models\CategoryProvider;
use Faker\Generator as Faker;

$factory->define(CategoryProvider::class, function (Faker $faker) {
    return [
      'category_id' => Category::inRandomOrder()->first(),
      'provider_id' => Provider::inRandomOrder()->first()
    ];
});
