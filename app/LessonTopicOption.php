<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonTopicOption extends Model
{
    protected $fillable = [
        'lesson_topic_id', 'option', 'correct',
    ];
}
