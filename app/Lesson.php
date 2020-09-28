<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'description',
        'title',
        'category_id',
        'question_ids',
    ];
    
    public function lessonUsers()
    {
        return $this->hasMany(LessonUser::class, 'lesson_id');
    }
}
