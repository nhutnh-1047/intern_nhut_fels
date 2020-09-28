<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    protected $table = 'question_option';

    protected $fillable = [
        'question_id',
        'option',
        'correct',
    ];
}
