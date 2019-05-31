<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Follow;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Follow::class, function (Faker $faker) {
    $user_id = User::pluck('id');
    $followed_id = User::pluck('id');
    dd(zip($user_id, $followed_id));
    return [
        compact('user_id'),
        compact('followed_id')
    ];
});
