<?php

namespace App\Http\Controllers;

use App\Models\Cart_item;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Models\Tax;
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

            //カートページにリダイレクト
            return redirect('login/cart_read');

            /**レコードが存在していた場合は該当のレコードの購入数に追加してレコードをアップデート */
        } else if ($cart_in != null) {
            $form = $request->count;

            //タイムスタンプを無効化
            $cart_in->timestamps = false;
            //該当レコードの購入数を追加
            $cart_in->increment('count', $form);

            //カートページにリダイレクト
            return redirect('login/cart_read');
        }
    }

    /**
     * カートページ
     * @param Request $request
     * @return void
     */
    public function cart_read(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //userのカート情報と税率を取得してcart情報ページへ移動
        $cart_items = new Cart_item();
        $cart_items = $cart_items->getCart_items($request);

        $total_price = 0;

        foreach ($cart_items as $cart) {
            $total_price += $cart->price * $cart->count;
        }


        $data = [
            'tax' => $tax,
            'cart_items' => $cart_items,
            'total_price' => $total_price,
        ];
        return view('login_EC.login_cart', $data);
    }
}
