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

/** 商品ページ */
Route::get('/product', 'ProductController@product');

/** 検索結果ページ */
Route::get('/search', 'ProductController@master');

/**詳細検索ページ */
//categoryで検索
Route::get('/details/category', 'ProductController@category');
//capacityで絞り込み
Route::get('/details/capacity', 'ProductController@capacity');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/** ログイン済みのメインページ */
Route::get('/login/main', 'ProductController@login_main')->middleware('auth');

/** ログイン済みの商品ページ */
Route::get('/login/product', 'ProductController@login_product')->middleware('auth');

/** ログイン済みの検索結果ページ */
Route::get('/login/search', 'ProductController@login_master')->middleware('auth');

/** ログイン済みの詳細検索結果ページ */
//categoryで検索
Route::get('/login/details/category', 'ProductController@login_category')->middleware('auth');
//capacityで絞り込み
Route::get('/login/details/capacity', 'ProductController@login_capacity')->middleware('auth');

/** カートページ */
Route::get('/login/cart_read', 'CartController@cart_read')->middleware('auth');

/** 商品をカートに追加してカートページへ移動 */
Route::post('/login/cart_in', 'CartController@cart_in')->middleware('auth');

/** ユーザー情報ページ */
Route::get('/user_inf', 'UserController@user_inf')->middleware('auth');

/** ユーザー情報変更ページ */
Route::get('/user_edit', 'UpdateUserController@user_edit')->middleware('auth');

Route::post('/user_up', 'UpdateUserController@user_up')->middleware('auth');
