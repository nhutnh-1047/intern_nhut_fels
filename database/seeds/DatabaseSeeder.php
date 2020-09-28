<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(QuestionOptionSeeder::class);
        // $this->call(LessonTopicSeeder::class);
        // $this->call(LessonTopicOptionSeeder::class);
        // $this->call(WordSeeder::class);
        // $this->call(WordLearnSeeder::class);
        // $this->call(LessonUserSeeder::class);
       
    }
}
