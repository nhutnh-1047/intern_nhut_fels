<?php

use Illuminate\Database\Seeder;

class LessonTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LessonTopic::class, 100)->create();
    }
}
