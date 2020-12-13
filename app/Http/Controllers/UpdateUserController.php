<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    /**
     * ユーザー情報変更ページ
     */
    public function user_edit(Request $request)
    {
        return view('Login_EC.user_up');
    }

    /**
     * ユーザー情報変更処理
     */
    public function user_up(Request $request)
    {
        /**バリデーション */
        $this->validate($request, User::$rules, User::$messages);

        /**変更するユーザ情報の確定 */
        $auth = User::find(Auth::user()->id);
        // dd($auth);

        /**formの内容を全て取得 */
        $form = $request->all();

        /**更新内容の保存 */
        $auth->fill($form)->save();

        /**ユーザ情報ページにリダイレクト */
        return view('EC.main');
    }
}
