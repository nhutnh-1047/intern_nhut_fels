<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'id_parent',
    ];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'category_id');
    }

    public function category() {
        return $this->hasMany(Category::class, 'id_parent');
    }
}
