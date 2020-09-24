<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordLearn extends Model
{
    protected $fillable = [
        'word_id',
        'user_id',
        'status',
    ];
}
