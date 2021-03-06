<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use App\Models\Prefecture;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/login/main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * ユーザ登録画面の表示
     *
     * @return void
     */
    public function getRegister()
    {
        //都道府県情報を取得
        $prefectures  = new Prefecture();
        $prefectures = $prefectures->getData();

        //配列にデータを格納
        $data = [
            'prefectures' => $prefectures
        ];
        //ユーザー登録画面に変数の受け渡し
        return view('auth.register', $data);
    }

    /**
     *バリデーションの条件の変更
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'between:2,8'],
    //         'password' => ['required', 'string', 'between:8,30', 'confirmed'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'phone' => ['required', 'between:11,20'],
    //         'postcode' => ['required', 'string', 'between:7,8'],
    //         'prefecture_id' => ['required', 'integer'],
    //         'city' => ['required', 'string', 'max:24'],
    //         'block' => ['required', 'string', 'max:64'],
    //         'building' => ['max:255'],
    //     ]);
    // }

    /**
     * 登録成功時に新しいユーザーインスタンスを作成
     * @param  array  $data
     * @return \App\User
     */
    protected function postRegister(Request $data)
    {
        //バリデーションの実行
        $this->validate($data, User::$register);

        //ユーザー登録を実行
        User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'phone' => $data['phone'],
            'postcode' => $data['postcode'],
            'prefecture_id' => $data['prefecture_id'],
            'city' => $data['city'],
            'block' => $data['block'],
            'building' => $data['building'],
        ]);

        //登録完了画面を表示
        return view('auth.registered');
    }

    // public function registered()
    // {
    //     return view('auth.registered');
    // }
}
