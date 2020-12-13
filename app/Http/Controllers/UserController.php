<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * ユーザー情報と都道府県情報を取得して確認ページへ渡す
     *
     * @param Request $request
     * @return void
     */
    public function user_inf()
    {
        //usersテーブルとprefecturesテーブルのリレーションを実行
        $users = User::with('prefecture')
            ->join('prefectures', 'prefectures.id',  '=', 'users.prefecture_id')
            ->where('users.id', Auth::user()->id)
            //ユーザー情報を取得して確認ページへ渡す
            ->select(
                'users.id',
                'prefectures.name as prefectures_name',
                'users.name',
                'users.password',
                'users.email',
                'users.phone',
                'users.postcode',
                'users.city',
                'users.block',
                'users.building'
            )
            ->paginate(10);

        $data = [
            'users' => $users,
        ];
        return view('login_EC.user_inf', $data);
    }
}
