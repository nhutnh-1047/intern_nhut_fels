<?php
namespace App\Repositories;

use App\Lesson;
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
        return Lesson::findOrFail($id);
    }

    public function findLessonUser($id)
    {
        return User::findOrFail($id)->lessons()->get();
    }

    public function getNumberQuestion($id)
    {
        $questionIds = Lesson::where('id', '=', $id)->first(['question_ids']);

        return count(json_decode($questionIds['question_ids']));
    }
}
