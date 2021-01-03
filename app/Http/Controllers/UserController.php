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
        //Userモデルからユーザ情報の取得
        $users = new User();
        $users = $users->getUser();

        $data = [
            'users' => $users,
        ];
        return view('login_EC.user_inf', $data);
    }
}
