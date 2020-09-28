<?php
namespace App\Repositories;

interface LessonInterface
{
    public function all();

    public function findLessonId($id);

    public function findLessonUser($idUser);

    public function getNumberQuestion($id);
}
