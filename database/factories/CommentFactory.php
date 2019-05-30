<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Comment;
use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->text,
        'user_id' => User::pluck('id')->random(),
        'post_id' => Post::pluck('id')->random()
    ];
});
