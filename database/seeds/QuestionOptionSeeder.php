<?php

use Illuminate\Database\Seeder;

class QuestionOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            DB::table('question_option')->insert([
                [
                    'question_id' => $faker->unique()->biasedNumberBetween($min = 1, $max = 20),
                    'option' => $faker->word,
                    'correct' => 0,
                ],
            ]);
        }
    }
}
