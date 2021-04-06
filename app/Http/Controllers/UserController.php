<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Models\Prefecture;



class UserController extends Controller
{

    /**
     * ユーザー情報確認ページ
     *
     * @return void
     */
    public function user_inf()
    {
        // ユーザー情報を取得
        $user = new User();
        $user = $user->User_Data();

        // ユーザー情報確認ページへ変数の受け渡し
        return view('user_update.user_inf', $user);
    }

    /**
     * ユーザー名変更ページ
     *
     * @return void
     */
    public function name_edit()
    {
        // ログインしているユーザーから情報を取得
        $auth = User::find(Auth::user()->id);

        // ユーザー名変更ページに変数の受け渡し
        return view('user_update.name_edit', $auth);
    }

    /**
     * ユーザー名の変更を実行
     *
     * @param Request $request
     * @return void
     */
    public function name_update(Request $request)
    {
        // バリデーションの実行
        $this->validate($request, User::$name_rules);

        // ログインしているユーザーから変更するユーザ情報の確定
        $auth = User::find(Auth::user()->id);
        // ユーザ名を変更を実行
        $auth->name = $request->name;
        // 変更内容の保存
        $auth->save();

        //ユーザ情報ページにリダイレクト
        return redirect('/user_inf');
    }

    /**
     * パスワード変更ページ
     *
     * @return void
     */
    public function pass_edit()
    {
        return view('user_update.pass_edit');
    }

    /**
     * パスワードの変更を実行
     *
     * @param Request $request
     * @return void
     */
    public function pass_update(Request $request)
    {
        // バリデーションの実行
        $this->validate($request, User::$pass_rules);

        // ログインしているユーザーから変更するユーザ情報の確定
        $auth = User::find(Auth::user()->id);
        // パスワードの変更を実行
        $auth->password = bcrypt($request->get('password'));
        // 変更内容の保存
        $auth->save();

        // ユーザー情報ページへリダイレクト
        return redirect('/user_inf');
    }

    /**
     * メールアドレス変更ページ
     */
    public function email_edit()
    {
        // ログインしているユーザーから情報を取得
        $auth = User::find(Auth::user()->id);

        // メールアドレス変更ページに変数の受け渡し
        return view('user_update.email_edit', $auth);
    }

    /**
     * メールアドレスの変更を実行
     *
     * @param Request $request
     * @return void
     */
    public function email_update(Request $request)
    {
        // バリデーションの実行
        $this->validate($request, User::$email_rules);

        // ログインしているユーザーから変更するユーザ情報の確定
        $auth = User::find(Auth::user()->id);
        // メールアドレスの変更を実行
        $auth->email = $request->email;
        // 変更内容の保存
        $auth->save();

        // ユーザ情報ページにリダイレクト
        return redirect('/user_inf');
    }

    /**
     * 電話番号変更ページ
     *
     * @param Request $request
     * @return void
     */
    public function phone_edit(Request $request)
    {
        // ログインしているユーザーから情報を取得
        $auth = User::find(Auth::user()->id);

        // 電話番号変更ページに変数の受け渡し
        return view('user_update.phone_edit', $auth);
    }

    /**
     * 電話番号の変更を実行
     *
     * @param Request $request
     * @return void
     */
    public function phone_update(Request $request)
    {
        // バリデーションの実行
        $this->validate($request, User::$phone_rules);

        // ログインしているユーザーから変更するユーザ情報の確定
        $auth = User::find(Auth::user()->id);
        // 電話番号の変更を実行
        $auth->phone = $request->phone;
        // 変更内容の保存
        $auth->save();

        // ユーザ情報ページにリダイレクト
        return redirect('/user_inf');
    }

    /**
     * 住所変更ページ
     *
     * @param Request $request
     * @return void
     */
    public function address_edit(Request $request)
    {
        //ユーザー情報を取得
        $user = new User();
        $user = $user->User_Data();

        // 都道府県情報の取得
        $prefectures = new Prefecture();
        $prefectures = $prefectures->getData();

        // 配列にデータを格納
        $data = [
            'user' => $user,
            'prefectures' => $prefectures,
        ];

        //住所変更ページに変数の受け渡し
        return view('user_update.address_edit', $data);
    }

    /**
     * 住所の変更を実行
     *
     * @param Request $request
     * @return void
     */
    public function address_update(Request $request)
    {
        //バリデーションの実行
        $this->validate($request, User::$add_rules);

        // ログインしているユーザーから変更するユーザ情報の確定
        $auth = User::find(Auth::user()->id);
        // formの内容を全て取得
        $form = $request->all();
        // 内容を更新して保存
        $auth->fill($form)->save();

        // ユーザ情報ページにリダイレクト
        return redirect('/user_inf');
    }

    /**
     * ユーザー情報変更ページ
     */
    // public function user_edit(Request $request)
    // {
    //     //ユーザー情報の取得
    //     $user = new User();
    //     $user = $user->User_Data();

    //     //都道府県情報の取得
    //     $prefectures = new Prefecture();
    //     $prefectures = $prefectures->getData();

    //     $data = [
    //         'user' => $user,
    //         'prefectures' => $prefectures,
    //     ];

    //     return view('login_EC.user_up', $data);
    // }

    // /**
    //  * ユーザー情報変更処理
    //  */
    // public function user_up(Request $request)
    // {
    //     /**バリデーション */
    //     $this->validate($request, User::$rules, User::$messages);

    //     /**変更するユーザ情報の確定 */
    //     $auth = User::find(Auth::user()->id);
    //     // dd($auth);

    //     /**formの内容を全て取得 */
    //     $form = $request->all();

    //     /**更新内容の保存 */
    //     $auth->fill($form)->save();

    //     /**ユーザ情報ページにリダイレクト */
    //     return redirect('/login/main');
    // }
}
