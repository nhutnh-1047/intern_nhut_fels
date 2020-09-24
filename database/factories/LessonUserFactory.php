<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LessonUserFactory;
use Faker\Generator as Faker;

$factory->define(LessonUserFactory::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'lesson_id' => 1,
        'status' => $faker->biasedNumberBetween($min = 1, $max = 2),
    ];
});
