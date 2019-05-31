<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
        'email' => $faker->unique()->randomElement(['kamlotfull@gmail.com', 'cam-e-lot@yandex.ru', 'q@w.e']),
        'email_verified_at' => now(),
        'password' => '11111111', // password
        'remember_token' => Str::random(10),
    ];
});