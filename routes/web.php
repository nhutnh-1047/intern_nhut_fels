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

Route::resource('words', 'WordController', [
    'only' => ['index', 'show', 'update'],
]);
