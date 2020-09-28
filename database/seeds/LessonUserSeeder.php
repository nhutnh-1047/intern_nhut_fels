<?php

use Illuminate\Database\Seeder;

class LessonUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LessonTopicOption::class, 5)->create();
    }
}
