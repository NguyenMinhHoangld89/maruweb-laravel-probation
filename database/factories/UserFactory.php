<?php

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

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('P123@test'), // secret
        'birthday' => date('Y-m-d'),
        'image' => 'public/users/WL590ez8geGB1zIWSiOqykye7pimL8QJUV2kORZK.jpeg',
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->sentence(3),
        'slug' => $faker->unique()->words,
        'description' => $faker->sentence(10)
    ];
});
