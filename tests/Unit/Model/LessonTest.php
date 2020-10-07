<?php

namespace Tests\Unit\Model;

use App\Category;
use App\Lesson;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class LessonTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    protected $lesson;
    protected $category;

    protected function setUp(): void
    {
        parent::setUp();
        $this->category = factory(Category::class)->create();
        $this->lesson = factory(Lesson::class)->create([
            'category_id' => $this->category->id,
        ]);
    }

    public function test_lessons_table_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('lessons', [
                'description',
                'title',
                'category_id',
                'question_ids',
                'updated_at',
                'created_at',
            ])
        );
    }

    public function test_contains_valid_fillable_properties()
    {
        $this->assertEquals([
            'description',
            'title',
            'category_id',
            'question_ids',
        ], $this->lesson->getFillable());
    }

    public function test_lesson_has_many_lesson_users()
    {
        $this->assertInstanceOf(Collection::class, $this->lesson->lessonUsers);
    }
}
