<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**メインページに移動 */
    public function main(Request $request)
    {
        return view('EC.main');
    }

    /**ログイン済みのメインページに移動 */
    public function login_main(Request $request)
    {
        return view('login_EC.login_main');
    }
}
