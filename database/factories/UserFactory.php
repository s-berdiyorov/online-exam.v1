<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'is_active' => rand(0, 1),
        'gender' => rand(1, 2),
        'name' => $faker->name($gender),
        'surname' => $faker->firstName($gender),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456789'), // password
        'phone_number' => $faker->phoneNumber,
        'birthday' => $faker->date(),
        'group_id' => rand(1, 15),
        'picture' => $gender,
        'remember_token' => Str::random(10),
    ];
});
