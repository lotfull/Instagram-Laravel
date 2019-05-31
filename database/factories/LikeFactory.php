<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Like;
use App\User;
use App\Post;
use Faker\Generator as Faker;

function inject($elem, $array) {
    return $array->map(function ($n) use ($elem) { return $n->merge($elem); });
}

function zip($array1, $array2) {
    return $array1->reduce(function ($v, $n) use ($array2) { return array_merge($v, inject($n, $array2));  }, array());
}

$factory->define(Like::class, function (Faker $faker) {
    $user_id = User::pluck('id');
    $post_id = Post::pluck('id');
    dd(zip($user_id, $post_id));
    return [
        'user_id' => User::pluck('id')->random(),
        'post_id' => Post::pluck('id')->random(),
    ];
});
