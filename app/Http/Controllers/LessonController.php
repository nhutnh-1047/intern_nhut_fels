<?php

namespace App\Http\Controllers;

use App\LessonUser;
use App\Question;
use App\QuestionOption;
use App\Repositories\LessonInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    protected $lessonRepository;

    public function __construct(LessonInterface $lesson)
    {
        $this->middleware('auth');
        $this->lessonRepository = $lesson;
    }

    public function show($id)
    {
        $lesson = $this->lessonRepository->findLessonId($id);

        return view('lesson', ['lesson' => $lesson]);
    }

    public function showQuestion($id)
    {
        $lesson = $this->lessonRepository->findLessonId($id);
        $questions = Question::all()->load('options')->whereIn('id', json_decode($lesson['question_ids']));

        return view('questions', ['questions' => $questions, 'id' => $id]);
    }

    public function ajaxUserChoose(Request $request)
    {
        $result = QuestionOption::whereIn('id', $request->choose)->where('correct', '=', '1')->get()->toArray();
        $totalQuestion = $this->lessonRepository->getNumberQuestion($request->idPost);
        if ((count($result) / $totalQuestion * 100) >= 80) {
            LessonUser::where('id', $request->id)->update(['status' => config('setting.status_learn.complete')]);
            return response()->json(
                [
                    'alert' => __('messages.success_message'),
                    'success' => true,
                ]
            );
        }

        return response()->json(['alert' => __('messages.fail_message')]);
    }

    public function getMyLesson()
    {
        $lessons = $this->lessonRepository->findLessonUser(Auth::user()->id);

        return view('my_lesson', ['lessons' => $lessons]);
    }

}
