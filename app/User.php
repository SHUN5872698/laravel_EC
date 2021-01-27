<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;



class User extends Authenticatable
{
    use Notifiable;

    /**ガードするフィールド */
    protected $guarded = array('id');

    protected $fillable = ['prefecture_id', 'name', 'password', 'email', 'phone', 'postcode',  'city',  'block', 'building',];

    /** prefecturesテーブルとのリレーション */
    public function prefecture()
    {
        return $this->hasMany('App\Models\Prefecture', 'id', 'name');
    }

    /**ユーザ情報更新用のバリデーション*/
    //名前
    public static $name_rules = [
        'name' => ['required', 'string', 'between:2,8',],
    ];
    //パスワード
    public static $pass_rules = [
        'current_password' => ['required', 'password'],
        'password' => ['required', 'string', 'between:8,30', 'confirmed'],
    ];
    //メール
    public static $email_rules = [
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    ];
    //電話番号
    public static $phone_rules = [
        'phone' => ['required', 'between:11,20',],
    ];
    //住所
    public static $add_rules = [
        'postcode' => ['required', 'string', 'between:7,8'],
        'prefecture_id' => ['required', 'integer'],
        'city' => ['required', 'string', 'max:24'],
        'block' => ['required', 'string', 'max:64'],
        'building' => ['max:255'],
    ];

    /**
     * ユーザー情報の取得
     * prefecturesとjoinして都道府県名も取得
     * @var array
     */
    public function User_Data()
    {
        $users = User::with('prefecture')
            ->join('prefectures', 'prefectures.id',  '=', 'users.prefecture_id')
            ->where('users.id', Auth::user()->id)
            //ユーザー情報を取得して確認ページへ渡す
            ->select(
                'users.id',
                'users.prefecture_id',
                'users.name',
                'users.email',
                'users.password',
                'users.phone',
                'users.postcode',
                'users.city',
                'users.block',
                'users.building',
                'prefectures.name as prefectures_name',
            )
            ->first();
        return $users;
    }

    /**
     * 配列に対して非表示にする必要がある属性。
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * ネイティブタイプにキャストする必要がある属性。
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
