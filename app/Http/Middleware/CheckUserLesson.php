<?php

namespace App\Http\Middleware;

use App\Lesson;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserLesson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $courses = Lesson::findOrFail($request->id)->lessonUsers;
            foreach ($courses as $value) {
                if ($value->user_id === Auth::user()->id) {
                    return $next($request);
                }
            }

            return redirect()->route('home');
        }

    }
}
