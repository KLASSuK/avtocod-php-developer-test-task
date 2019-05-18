<?php

use App\Article;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Article::class, function (Faker $faker) {
    $users = \App\User::all()->shuffle();

    return [
        'title'        => $faker->sentence,
        'body'         => $faker->sentence,
        'id_owner'     => $users->first()->id,
        'published_at' => Carbon::now(),
    ];
});
