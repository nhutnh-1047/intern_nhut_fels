<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'content',
    ];

    public function options()
    {
        return $this->belongsToMany(QuestionOption::class, 'question_id');
    }
}
