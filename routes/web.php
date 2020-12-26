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

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** メインページ */
Route::get('/main', 'ProductController@main');

/**検索結果ページ */
Route::get('/search', 'ProductController@master');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** ログイン済みのメインページ */
Route::get('/login_main', 'ProductController@login_main')->middleware('auth');

/** ユーザー情報ページ */
Route::get('/user_inf', 'UserController@user_inf')->middleware('auth');

/** ユーザー情報変更ページ */
Route::get('/user_edit', 'UpdateUserController@user_edit')->middleware('auth');

Route::post('/user_up', 'UpdateUserController@user_up')->middleware('auth');
