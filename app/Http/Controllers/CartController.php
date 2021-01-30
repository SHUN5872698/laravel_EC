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
    /**
     * カートページに移動
     *
     */
    public function cart_read()
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //該当ユーザーのカート情報を取得
        $items = new Cart_item();
        $items = $items->Cart_items();

        //カート内商品の合計金額を取得
        $totalprice = new Cart_item();
        $totalprice = $totalprice->totalprice();

        //商品の合計金額を算出
        // $totalprice = 0;
        // foreach ($items as $item) {
        //     $totalprice += $item->price * $tax->percentage  * $item->count;
        // }
        $data = [
            'tax' => $tax,
            'items' => $items,
            'totalprice' => $totalprice,
        ];
        return view('login_EC.login_cart', $data);
    }

    /**
     * カートに商品を追加
     * @param Request $request
     * @return void
     */
    public function cart_in(Request $request)
    {
        //該当レコードの検索
        $cart_in = Cart_item::where('user_id', Auth::user()->id)
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


            //該当レコードの購入数を追加
            $cart_in->increment('count', $request->count);

            //カートページにリダイレクト
            return redirect('login/cart_read');
        }
    }

    /** 購入数の変更 */
    public function countUp(Request $request)
    {
        Cart_item::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->update([
                'count' => $request->count,
            ]);
        return redirect('login/cart_read');
    }

    /**  カートの商品を削除*/
    public function delete(Request $request)
    {
        Cart_item::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->delete();
        return redirect('login/cart_read');
    }

    /** 購入確認 */
    public function order_check()
    {
        //Userモデルからユーザ情報の取得
        $users = new User();
        $users = $users->User_Data();

        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //userのカート情報を取得
        $items = new Cart_item();
        $items = $items->Cart_items();

        //カート内商品の合計金額を取得
        $totalprice = new Cart_item();
        $totalprice = $totalprice->totalprice();

        $data = [
            'tax' => $tax,
            'items' => $items,
            'total_price' => $totalprice,
            'users' => $users,
        ];
        return view('login_EC.order_check', $data);
    }
}
