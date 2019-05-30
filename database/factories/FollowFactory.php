<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Follow;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Follow::class, function (Faker $faker) {
    $user_id = User::pluck('id')->random();
    $followed_id = User::pluck('id')->random();
    while ($followed_id == $user_id)
        $followed_id = User::pluck('id')->random();
    return [
        compact('user_id'),
        compact('followed_id')
    ];
});
