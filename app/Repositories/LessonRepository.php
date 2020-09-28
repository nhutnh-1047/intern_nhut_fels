<?php
namespace App\Repositories;

use App\Lesson;
use App\QuestionOption;
use App\Repositories\LessonInterface;
use App\User;

class LessonRepository implements LessonInterface
{
    public function all()
    {
        return Lesson::all();
    }

    public function findLessonId($id)
    {
        return Lesson::find($id);
    }

    public function findLessonUser($id)
    {
        return User::findOrFail($id)->lessons()->get();
    }

    public function getNumberQuestion($id)
    {
        return QuestionOption::where('question_id', '=', $id)->get()->count();
    }
}
