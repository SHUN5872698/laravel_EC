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

    /**ユーザ情報更新用のバリデーション*/
    //名前
    public static $name_rules = [
        'name' => ['required', 'string', 'between:2,8',],
    ];
    //パスワード
    public static $pass_rules = [
        'password' => ['required', 'string', 'min:8|max:30', 'confirmed'],
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

    /** バリデーションのエラーメッセージ*/
    // public static $messages = [
    //     'name.required' => '名前を入力して下さい。',
    //     'name.string' => '文字列で入力して下さい。',
    //     'name.between' => '2文字以上30文字以内で入力してください',

    //     'password.required' => '必須項目です。',
    //     'password.min' => '8文字以上で入力してください',
    //     'password.max' => '30文字以内で入力してください',
    //     'password.confirmed' => '確認欄と一致しません',

    //     'email.required' => 'メールアドレスを入力して下さい。',
    //     'email.string' => '文字列で入力して下さい。',
    //     'email.email' => 'メール形式で入力して下さい。',
    //     'email.unique' => 'すでにこのメールアドレスは登録されています。',
    //     'email.max:255' => '255文字以内で入力して下さい。',

    //     'phone.required' => '電話番号を入力して下さい。',
    //     'phone.between' => '正しい電話番号を入力して下さい。',

    //     'postcode.required' => '郵便番号を入力して下さい。',
    //     'postcode.string' => '文字列で入力して下さい。',
    //     'postcode.between' => '正しい郵便番号を入力して下さい。',

    //     'prefecture_id.required' => '都道府県を選択して下さい。',
    //     'prefecture_id.integer' => 'もう一度都道府県を選択しなおして下さい。',

    //     'city.required' => '市町村区を入力して下さい。',
    //     'city.string' => '文字列で入力して下さい。',
    //     'city.max' => '正しい住所を入力して下さい。',

    //     'block.required' => '番地を入力して下さい。',
    //     'block.string' => '文字列で入力して下さい。',
    //     'block.max' => '正しい住所を入力して下さい。',

    //     'building.max' => '正しい住所を入力して下さい。',

    // ];

    /**prefecturesテーブルとのリレーション*/
    public function prefecture()
    {
        return $this->hasMany('App\Models\Prefecture', 'id', 'name');
    }

    public function getName(Request $request)
    {
        $name = User::where('id', $request->id)
            ->first();
        return $name;
    }

    //ユーザー情報の取得
    public function User_Data()
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
