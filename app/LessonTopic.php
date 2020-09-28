<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonTopic extends Model
{
    protected $fillable = [
        'lesson_id', 'question', 'correct',
    ];

    public function topics()
    {
        return $this->hasMany('App\LessonTopicOption', 'lesson_topic_id');
    }
}
