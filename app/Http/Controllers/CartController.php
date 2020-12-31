<?php

namespace App\Http\Controllers;

use App\Models\Cart_item;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cartitem;
use App\User;
use App\Models\Product;
use App\Models\Productimage;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart_in(Request $request)
    {
        $cart_in = Cart_item::where('user_id', $request->user_id)
            ->where('product_id', $request->product_id)
            ->first();

        /** 同一のuser_idとproduct_idが存在しなかった場合
         * cart_itemsテーブルにレコードを新規作成*/
        if ($cart_in == null) {

            // Cart_itemモデルのオブジェクト作成
            $cart_in = new Cart_item();

            // formの内容を全て取得
            $form = $request->all();

            // ユーザーIDはログインユーザーのuser_idを代入
            $form['user_id'] = Auth::user()->id;

            //タイムスタンプを無効化
            $cart_in->timestamps = false;

            //レコードを新規作成
            $cart_in->fill($form)->save();

            //userのカート情報を取得してcart情報ページへ移動
            return view('login_EC.login_main');
        } else if ($cart_in != null) {
            /**レコードが存在していた場合は該当のレコードの購入数に追加してレコードをアップデート */
            $form = $request->count;

            //タイムスタンプを無効化
            $cart_in->timestamps = false;
            $cart_in->increment('count', $form);

            //userのカート情報を取得してcart情報ページへ移動
            return view('login_EC.login_main');
        }
    }
}
