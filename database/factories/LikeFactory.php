<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Like;
use App\User;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Like::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'post_id' => $faker->unique()->randomElement(Post::pluck('id'))
    ];
});
