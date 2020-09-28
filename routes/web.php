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

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('change-language/{language}', 'HomeController@changeLanguage')
    ->name('user.change-language')->middleware('locale');

Auth::routes();
Route::get('/login', 'HomeController@login')->name('user.login');
Route::get('/logout', 'Auth\LogoutController@index')->name('user.logout');
