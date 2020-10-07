<?php

namespace Tests\Unit\Model;

use App\Word;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;

class WordTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $word;

    protected function setUp(): void
    {
        parent::setUp();

        $this->word = factory(Word::class)->create();
    }

    public function test_words_table_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('words', [
                'word_eng',
                'word_vi',
            ])
        );
    }
}
