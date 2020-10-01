<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'Homecontroller@index')->name('home');
Route::post('/join/lesson', 'Homecontroller@setJoinLesson');

Route::get('change-language/{language}', 'HomeController@changeLanguage')
    ->name('user.change-language')->middleware('locale');
Route::get('mylessons', 'LessonController@getMyLesson')->name('lesson.my.get');
Route::get('/category/{id}', 'HomeController@getCategory')->name('category.filter.id');
Route::group(
    [
        'prefix' => 'lesson',
        'middleware' => 'check.user.lesson',
    ], function () {
        Route::get('view/{id}', 'LessonController@show')->name('lesson.view.id');
        Route::get('{id}/exam', 'LessonController@showQuestion')->name('lesson.question.get');
        Route::post('{id}/exam', 'LessonController@ajaxUserChoose')->name('lesson.question.post');
    }
);
Auth::routes();
Route::get('/login', 'HomeController@login')->name('user.login');
Route::get('/logout', 'Auth\LogoutController@index')->name('user.logout');

Route::resource('words', 'WordController');

Route::get('/admin', function () {
    return view('admin.index');
});

Route::group(
    [
        'prefix' => 'admin',
        'middleware' => 'can:admin',
    ], function () {
        Route::get('/', 'AdminController@index')->name('admin.index');
        Route::group(['prefix' => 'member'], function () {
            Route::get('/', 'AdminController@showMember')->name('admin.member');
            Route::get('/edit/{id}', 'AdminController@showEditMember')->name('admin.member.edit');
            Route::post('/edit/{id}', 'AdminController@postEditMember')->name('admin.member.edit.post');
        });
        Route::group(['prefix' => 'lesson'], function () {
            Route::get('/', 'AdminController@showLesson')->name('admin.lesson');
            Route::get('/delete/{id}', 'AdminController@deleteLesson')->name('admin.lesson.delete');
            Route::get('/edit/{id}', 'AdminController@showEditLesson')->name('admin.lesson.edit');
            Route::post('/edit/{id}', 'AdminController@postEditLesson')->name('admin.lesson.edit.post');
        });
        Route::get('word', 'AdminController@showWord')->name('admin.word');
    }
);
