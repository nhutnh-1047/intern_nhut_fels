<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LessonTopicOption;
use Faker\Generator as Faker;

$factory->define(LessonTopicOption::class, function (Faker $faker) {
    return [
        'lesson_topic_id' => 1,
        'option' => $faker->word,
    ];
});
