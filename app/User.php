<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function word()
    {
        return $this->belongsToMany(Word::class, 'words_learn', 'user_id', 'id')->withPivot('status');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'user_id');
    }

    public function lessons()
    {
        // return $this->hasMany(LessonUser::class, 'user_id');
        return $this->belongsToMany(Lesson::class, 'lesson_users', 'user_id', 'id')->withPivot('status');
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'role_id');
    }
}
