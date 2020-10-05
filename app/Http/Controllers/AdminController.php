<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Repositories\Model\CategoryRepository;
use App\Repositories\Model\LessonRepository;
use App\Repositories\Model\UserRepository;
use App\Repositories\Model\WordRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $lessonRepo;
    protected $categoryRepo;
    protected $userRepo;
    protected $wordRepo;

    public function __construct(
        LessonRepository $lesson,
        CategoryRepository $category,
        UserRepository $user,
        WordRepository $word
    ) {
        $this->lessonRepo = $lesson;
        $this->categoryRepo = $category;
        $this->userRepo = $user;
        $this->wordRepo = $word;
    }

    public function index()
    {
        return view('admin.index');
    }

    public function showMember()
    {
        $users = $this->userRepo->all();

        return view('admin.manager_member', ['users' => $users]);
    }

    public function showEditMember($id)
    {
        $user = $this->userRepo->find($id);
        if ($user) {
            return view('admin.edit_user', ['user' => $user]);
        }

        return response()->json(['alert' => __('messages.not_found')]);
    }

    public function postEditMember(Request $request, $id)
    {
        $request['password'] = \Hash::make($request->password);
        $update = $this->userRepo->update($request->all(), $id);
        if ($update) {

            return response()->json(['alert' => __('messages.success_message')]);
        }

        return response()->json(['alert' => __('messages.not_found')]);
    }

    public function showLesson()
    {
        $lessons = Lesson::paginate(config('setting.paginate.number'));

        return view('admin.manager_lesson', ['lessons' => $lessons]);
    }

    public function deleteLesson($id)
    {
        $delete = $this->lessonRepo->delete($id);
        if ($delete) {
            return redirect()->back()->withSuccess(__('messages.fail_message'));
        }

        return redirect()->back()->withErrors(__('messages.fail_message'));
    }

    public function showEditLesson($id)
    {
        $lesson = $this->lessonRepo->find($id);
        $categories = $this->categoryRepo->all();

        return view('admin.edit_lesson', [
            'lesson' => $lesson,
            'categories' => $categories,
        ]);

    }

    public function postEditLesson(Request $request, $id)
    {
        $update = $this->lessonRepo->update($request->all(), $id);
        if ($update) {
            return response()->json(['alert' => __('messages.success_message')]);
        }
        return response()->json(['alert' => __('messages.fail_message')]);
    }

    public function showWord()
    {
        $words = $this->wordRepo->all();

        return view('admin.manager_word', ['words' => $words]);
    }

    public function showEditWord($id)
    {
        $word = $this->wordRepo->find($id);

        return view('admin.edit_word', ['word' => $word]);
    }

    public function postEditWord(Request $request, $id)
    {
        $update = $this->wordRepo->update($request->all(), $id);
        if ($update) {
            return response()->json(['alert' => __('messages.success_message')]);
        }

        return response()->json(['alert' => __('messages.fail_message')]);
    }

    public function showAddLesson()
    {
        $categories = $this->categoryRepo->all();

        return view('admin.add_lesson', [
            'categories' => $categories,
        ]);
    }

    public function postAddLesson(Request $request)
    {
        $request['question_ids'] = json_encode($request->question_ids);
        $insert = $this->lessonRepo->create($request->all());
        if ($insert) {
            return response()->json(['alert' => __('messages.success_message')]);
        }

        return response()->json(['alert' => __('messages.fail_message')]);
    }

}
