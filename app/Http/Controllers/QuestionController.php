<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $totalQuestion = Question::find($id)->options()->count();

        $arrAns = $request->except(['_token']);
        $wrong = [];
        $correct = [];
        foreach ($arrAns as $key => $value) {
            if ($value == 0) {
                $wrong[] = $key;
            } else {
                $correct[] = $key;
            }
        }
        if ($totalQuestion > 0) {
            echo (count($correct) / $totalQuestion) * 100;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::find($id);
        
        $questions = [];
        foreach (json_decode($lesson->question_ids) as $value) {
            $questions[] = $this->getQuestion($value);
        }

        return view('questions', ['questions' => $questions, 'id' => $id]);
    }

    public function getQuestion($id)
    {
        $data = Question::find($id)->options;
        $data->content = Question::find($id)->content;

        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
