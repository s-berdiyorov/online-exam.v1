<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'name' => $faker->name($gender),
        'surname' => $faker->firstName($gender),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('s-952526112'), // password
        'picture' => 'admin',
    ];
});
