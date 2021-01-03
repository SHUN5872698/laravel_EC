<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
}
