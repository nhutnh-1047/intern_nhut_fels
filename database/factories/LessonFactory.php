<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lesson;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    return [
        'title' => $faker->text($maxNbChars = 50),
        'description' => $faker->text($maxNbChars = 300),
        'category_id' => $faker->biasedNumberBetween($min = 1, $max = 5),
    ];
});
