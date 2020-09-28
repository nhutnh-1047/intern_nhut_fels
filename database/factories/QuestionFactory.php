<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'content' => $faker->sentence($nbWords = 20, $variableNbWords = true),
    ];
});
