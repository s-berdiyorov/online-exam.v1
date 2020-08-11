<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Moderator;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Moderator::class, function (Faker $faker) {
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
        'subject_id' => rand(1, 15),
        'picture' => $gender,
        'remember_token' => Str::random(10),
    ];
});
