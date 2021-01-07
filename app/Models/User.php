<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class User extends Model
{
    /**ガードするフィールド */
    protected $guarded = array('id');

    /**
     * prefecturesテーブルとのリレーション
     * @return void
     */
    public function prefecture()
    {
        return $this->hasOne('App\Models\Prefecture', 'id');
    }

    public function getUser()
    {
        //users情報の取得
        $users = User::with('prefecture')
            ->join('prefectures', 'prefectures.id',  '=', 'users.prefecture_id')
            ->where('users.id', Auth::user()->id)
            //ユーザー情報を取得して確認ページへ渡す
            ->select(
                'users.id',
                'prefectures.name as prefectures_name',
                'users.name',
                'users.email',
                'users.phone',
                'users.postcode',
                'users.city',
                'users.block',
                'users.building'
            )
            ->get();
        return $users;
    }

    public function orderUser()
    {
        //users情報の取得
        $users = User::with('prefecture')
            ->join('prefectures', 'prefectures.id',  '=', 'users.prefecture_id')
            ->where('users.id', Auth::user()->id)
            //ユーザー情報を取得して確認ページへ渡す
            ->select(
                'users.id',
                'users.prefecture_id',
                'prefectures.name as prefectures_name',
                'users.name',
                'users.email',
                'users.phone',
                'users.postcode',
                'users.city',
                'users.block',
                'users.building'
            )
            ->get();
        return $users;
    }

    /** 購入時のデータ取得 */
    public function order_confirmed(Request $request)
    {
        //users情報の取得
        $users = User::with('prefecture')
            ->where('users.id', $request->user_id)
            //ユーザー情報を取得して確認ページへ渡す
            ->select(
                'users.id',
                'users.prefecture_id',
                'users.name',
                'users.email',
                'users.phone',
                'users.postcode',
                'users.city',
                'users.block',
                'users.building'
            )
            ->first();
        return $users;
    }
}
