<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Like;
use App\User;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'user_id' => User::pluck('id')->random(),
        'post_id' => Post::pluck('id')->random()
    ];
});
