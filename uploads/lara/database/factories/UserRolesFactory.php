<?php

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Faker\Factory;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */

    $factory->define(UserRole::class, function (Faker $faker) {
        $users = User::all();
        $roles = Role::all();
        $userRoles = [
            'user_id' => $faker->randomElement($users)->id,
            'role_id' => $faker->randomElement($roles)->id,
        ];

        return $userRoles;
    });
