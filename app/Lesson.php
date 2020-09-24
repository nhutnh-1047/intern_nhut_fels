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
}
