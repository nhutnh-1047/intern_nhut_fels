<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Word;
use Faker\Generator as Faker;

$factory->define(Word::class, function (Faker $faker) {
    return [
        'word_eng' => $faker->sentence($nbWords = $faker->biasedNumberBetween($min = 1, $max = 4), $variableNbWords = true),
        'word_vi' => $faker->sentence($nbWords = $faker->biasedNumberBetween($min = 1, $max = 4), $variableNbWords = true),
    ];
});
