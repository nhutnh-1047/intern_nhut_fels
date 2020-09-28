<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LessonUser extends Model
{
    protected $fillable = [
        'user_id', 'lesson_id', 'status',
    ];
}
