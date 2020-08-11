<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
        'type' => rand(1, 4),
        'parent_id' => rand(1, 15),
        'title' => $faker->paragraph,
    ];
});
