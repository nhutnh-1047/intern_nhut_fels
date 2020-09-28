<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\LessonUser;
use App\Question;
use App\QuestionOption;
use App\Repositories\LessonInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    protected $lesson;

    public function __construct(LessonInterface $lesson)
    {
        $this->middleware('auth');
        $this->lesson = $lesson;
    }

    public function show($id)
    {
        $lesson = $this->lesson->findLessonId($id);

        return view('lesson', ['lesson' => $lesson]);
    }

    public function showQuestion($id)
    {
        $lesson = $this->lesson->findLessonId($id);
        $questions = Question::find(json_decode($lesson['question_ids']))->toArray();
        foreach ($questions as $key => $value) {
            $question_ids[] = $value['id'];
        }
        $options = QuestionOption::whereIn('question_id', $question_ids)->get()->toArray();

        return view('questions', ['questions' => $questions, 'id' => $id, 'options' => $options]);
    }

    public function store(Request $request, $id)
    {
        $lesson = $this->lesson->findLessonId($id)->toArray();

        dd($this->lesson->getNumberQuestion(1));

        $totalQuestion = count(json_decode($lesson['question_ids']));
        $userAnswer = $request->except(['_token']);

        dd($userAnswer);

        // $correct = [];
        foreach ($userAnswer as $value) {
            $correct[] = QuestionOption::where('id', '=', $value)->where('correct', '=', '1')->get()->toArray();
        }
        $correct = array_filter($correct);
        dd($correct);

        if ($totalQuestion > 0) {
            if ((count($correct) / $totalQuestion) * 100 >= 20) {
                LessonUser::where('id', $id)->update(['status' => 1]);

                return view('result', ['result' => true]);
            }

            return view('result', ['result' => false]);
        }
    }

    public function ajaxUserChoose(Request $request)
    {
        $result = QuestionOption::whereIn('id', $request->choose)->where('correct', '=', '1')->get()->toArray();
        $totalQuestion = $this->lesson->getNumberQuestion($request->total);
        if ((count($result) / $totalQuestion * 100) >= 20) {
            LessonUser::where('id', $request->id)->update(['status' => 1]);
            return true;
        }
        return;
    }

    public function getMyLesson()
    {
        $lessons = $this->lesson->findLessonUser(Auth::user()->id);

        return view('my_lesson', ['lessons' => $lessons]);
    }

}
