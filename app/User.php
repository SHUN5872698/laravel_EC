<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**ガードするフィールド */
    protected $guarded = array('id');

    /**ユーザ情報更新用のバリデーション*/
    public static $rules = [
        'name' => ['required', 'string', 'min:4|max:30'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'phone' => ['required', 'min:11|max:20'],
        'postcode' => ['required', 'string', 'max:8'],
        'prefecture_id' => ['required', 'integer'],
        'city' => ['required', 'string', 'max:24'],
        'block' => ['required', 'string', 'max:64'],
        'building' => ['max:255'],
    ];

    // /** バリデーションのエラーメッセージ*/
    public static $messages = [
        'name.required' => '名前を入力して下さい。',
        'name.string' => '文字列で入力して下さい。',
        'name.min' => '4文字以上で入力して下さい。',
        'name.max' => '30文字以内で入力して下さい。',
        'email.required' => 'メールアドレスを入力して下さい。',
        'email.string' => '文字列で入力して下さい。',
        'email.email' => 'メール形式で入力して下さい。',
        'email.unique' => 'すでにこのメールアドレスは登録されています。',
        'email.max:255' => '255文字以内で入力して下さい。',
        'phone.required' => '電話番号を入力して下さい。',
        'phone.min' => '正しい電話番号で入力して下さい。',
        'phone.max' => '正しい電話番号で入力して下さい。',
        'postcode.required' => '郵便番号を入力して下さい。',
        'postcode.string' => '文字列で入力して下さい。',
        'postcode.max' => '正しい郵便番号を入力して下さい。',
        'prefecture_id.required' => '都道府県を選択して下さい。',
        'prefecture_id.integer' => 'もう一度都道府県を選択しなおして下さい。',
        'city.required' => '市町村区を入力して下さい。',
        'city.string' => '文字列で入力して下さい。',
        'city.max' => '正しい住所を入力して下さい。',
        'block.required' => '番地を入力して下さい。',
        'block.string' => '文字列で入力して下さい。',
        'block.max' => '正しい住所を入力して下さい。',
        'building.max' => '正しい住所を入力して下さい。'
    ];

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
