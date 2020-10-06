<?php
namespace App\Repositories\Model;

use App\Lesson;
use App\Repositories\EloquentRepository;

class LessonRepository extends EloquentRepository
{
    public function getModel()
    {
        return Lesson::class;
    }
}
