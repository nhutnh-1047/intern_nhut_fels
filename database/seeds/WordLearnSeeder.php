<?php

use Illuminate\Database\Seeder;

class WordLearnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\WordLearn::class, 5)->create();
    }
}
