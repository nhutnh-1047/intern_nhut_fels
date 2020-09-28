<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'content',
    ];

    public function correctAns()
    {
        return $this->options()->getOriginal();
    }

    public function options()
    {
        return $this->hasMany(QuestionOption::class, 'question_id');
    }

}
