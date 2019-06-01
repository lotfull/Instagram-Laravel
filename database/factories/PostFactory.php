<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $images_path = storage_path('app/public/images');
    return [
        'image' => $faker->image($images_path, 300, 300, null, false),
        'description' => $faker->text,
        'user_id' => App\User::pluck('id')->random()
    ];
});
