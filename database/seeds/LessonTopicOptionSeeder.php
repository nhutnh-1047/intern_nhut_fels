<?php

use Illuminate\Database\Seeder;

class LessonTopicOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LessonTopicOption::class, 4)->create();
    }
}
