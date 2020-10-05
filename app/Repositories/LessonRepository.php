<?php
namespace App\Repositories;

use App\Lesson;
use App\Repositories\LessonInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

class LessonRepository implements LessonInterface
{
    public function all()
    {
        return Lesson::all();
    }

    public function findLessonId($id)
    {
        try {
            return Lesson::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return abort(404);
        }
    }

    public function findLessonUser($id)
    {
        return $this->findLessonId($id)->lessons()->get();
    }

    public function getNumberQuestion($id)
    {
        $questionIds = Lesson::where('id', '=', $id)->first(['question_ids']);

        return count(json_decode($questionIds['question_ids']));
    }

    public function update($id, $data)
    {
        return $this->findLessonId($id)->update($data);
    }

    public function delete($id) {
        return $this->findLessonId($id)->delete();
    }
}
