<?php

namespace App\Http\Controllers;

use App\Repositories\Model\UserRepository;
use App\WordLearn;
use Illuminate\Http\Request;

class WordController extends Controller
{

    protected $userRepo;

    public function __construct(UserRepository $user)
    {
        $this->userRepo = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $words = $this->userRepo->find($id)->load('word');

        return view('words', ['words' => $words, 'id' => 1]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $words = $this->userRepo->find($id)->load('word');

        return view('words', ['words' => $words, 'id' => $id]);
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
        $wordlearn = WordLearn::where('user_id', '=', $request->idUser)->where('word_id', '=', $request->idWord)->first();
        if ($wordlearn->status) {
            $status = $wordlearn->update(['status' => config('setting.status_learn.notcomplete')]);

            return response()->json(['alert' => __('messages.forget')]);
        } else {
            $status = $wordlearn->update(['status' => config('setting.status_learn.complete')]);

            return response()->json(['alert' => __('messages.remeber')]);
        }
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
