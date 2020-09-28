<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\WordLearn;
use Faker\Generator as Faker;

$factory->define(WordLearn::class, function (Faker $faker) {
    return [
        'word_id' => $faker->unique(true)->biasedNumberBetween($min = 1, $max = 100),
        'user_id' => $faker->unique(true)->biasedNumberBetween($min = 1, $max = 5),
        'status' => $faker->biasedNumberBetween($min = 1, $max = 2),
    ];
});
