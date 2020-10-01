<?php

namespace App\Http\Controllers;

use App\Category;
use App\Lesson;
use App\LessonUser;
use App\Repositories\LessonInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    protected $lessonRepository;

    public function __construct(LessonInterface $lesson)
    {
        $this->lessonRepository = $lesson;
    }

    public function changeLanguage($language)
    {
        Session::put('website_language', $language);

        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lessons = Lesson::paginate(6)->load('lessonUsers')->all();

        return view('index', ['lessons' => $lessons]);
    }

    public function login()
    {
        return view('auth.login');
    }

    public function updateProfile()
    {
        return view('auth.register');
    }

    public function setJoinLesson(Request $request)
    {
        $checkJoin = LessonUser::where('user_id', '=', Auth::user()->id)
            ->where('lesson_id', '=', $request->idLesson)
            ->count();
        if (!$checkJoin) {
            LessonUser::create(
                [
                    'user_id' => Auth::user()->id,
                    'lesson_id' => $request->idLesson,
                    'status' => config('setting.start.join'),
                ]
            );
        }
    }

    public function getCategory($id)
    {
        $lessons = Category::findOrFail($id)->lessons()->paginate(config('setting.paginate.number'));

        return view('index', ['lessons' => $lessons]);
    }

}
