<?php

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
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** メインページ */
Route::get('/main', 'PrefectureController@main');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** ログイン済みのメインページ */
Route::get('/login_main', 'PrefectureController@login_main')->middleware('auth');

/** ユーザー情報ページ */
Route::get('/user_inf', 'UserController@user_inf')->middleware('auth');

/** ユーザー情報変更ページ */
Route::get('/user_edit', 'UpdateController@user_edit')->middleware('auth');
Route::post('/user_up', 'UpdateController@user_up')->middleware('auth');
