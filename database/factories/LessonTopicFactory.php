<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LessonTopic;
use Faker\Generator as Faker;

$factory->define(LessonTopic::class, function (Faker $faker) {
    return [
        'lesson_id' => 1,
        'question' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'correct' => 1,
    ];
});
