<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Follow;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Follow::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'followed_id' => $faker->unique()->numberBetween(2, User::all()->count())
    ];
});
