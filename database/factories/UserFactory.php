<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Constants\UserTypes;
use App\Constants\GenderTypes;
use App\Constants\ActiveStatus;
use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'user_name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'password' => 'secret', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->state(User::class, 'male', function(Faker $faker) {
    return [
        'gender' => GenderTypes::MALE,
    ];
});

$factory->state(User::class, 'female', function(Faker $faker) {
    return [
        'gender' => GenderTypes::FEMALE,
    ];
});

$factory->state(User::class, 'verified', function(Faker $faker) {
    return [
        'email_verified_at' => date('Y-m-d H:i:s')
    ];
});

$factory->state(User::class, 'active', function(Faker $faker) {
    return [
        'status' => ActiveStatus::ACTIVE,
    ];
});

$factory->state(User::class, 'disabled', function(Faker $faker) {
    return [
        'status' => ActiveStatus::DISABLED,
    ];
});

$factory->state(User::class, 'super', function(Faker $faker) {
    return [
        'user_type' => UserTypes::SUPERADMIN,
    ];
});

$factory->state(User::class, 'admin', function(Faker $faker) {
    return [
        'user_type' => UserTypes::ADMIN,
    ];
});
$factory->state(User::class, 'staff', function(Faker $faker) {
    return [
        'user_type' => UserTypes::STAFF,
    ];
});
$factory->state(User::class, 'client', function(Faker $faker) {
    return [
        'user_type' => UserTypes::CLIENT,
    ];
});