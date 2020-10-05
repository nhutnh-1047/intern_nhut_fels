<?php

namespace App\Http\Controllers;

use App\Category;
use App\Lesson;
use App\Repositories\LessonInterface;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    protected $lessonRepository;

    public function __construct(LessonInterface $lesson)
    {
        $this->lessonRepository = $lesson;
    }

    public function index()
    {

        return view('admin.index');
    }

    public function showMember()
    {
        $users = User::all();

        return view('admin.manager_member', ['users' => $users]);
    }

    public function showEditMember($id)
    {
        $user = User::findOrFail($id);

        return view('admin.edit_user', ['user' => $user]);
    }

    public function postEditMember(Request $request, $id)
    {
        $request['password'] = \Hash::make($request->password);
        $update = User::findOrFail($id)->update($request->all());
        if ($update) {
            return response()->json(['alert' => __('messages.success_message')]);
        }

        return response()->json(['alert' => __('messages.fail')]);
    }

    public function showLesson()
    {
        $lessons = Lesson::paginate(config('setting.paginate.number'));

        return view('admin.manager_lesson', ['lessons' => $lessons]);
    }

    public function deleteLesson($id)
    {
        $lesson = $this->lessonRepository->findLessonId($id)->delete();

        return view('admin.index');
    }

    public function showEditLesson($id)
    {
        $lesson = $this->lessonRepository->findLessonId($id);
        $categories = Category::all();

        return view('admin.edit_lesson', [
            'lesson' => $lesson,
            'categories' => $categories,
        ]);
    }

    public function postEditLesson(Request $request, $id)
    {
        $update = $this->lessonRepository->update($id, $request->all());
        if ($update) {
            return response()->json(['alert' => __('messages.success_message')]);
        }

        return response()->json(['alert' => __('messages.fail_message')]);
    }

    public function showWord()
    {
        return view('admin.manager_word');
    }
}
