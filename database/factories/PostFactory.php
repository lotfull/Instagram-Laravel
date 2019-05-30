<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'image' => $faker->name,
        'description' => $faker->text,
        'user_id' => App\User::pluck('id')->random()
    ];
});
