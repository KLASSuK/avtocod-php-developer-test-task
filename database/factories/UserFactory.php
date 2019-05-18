<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => Hash::make('secret'),
        'remember_token'    => Str::random(10),
    ];
});
