<?php

namespace App\Http\Controllers;

use App\Models\Cart_item;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tax;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * カートページに移動
     * @return void
     */
    public function cart_read()
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //userのカート情報を取得
        $cart_items = new Cart_item();
        $cart_items = $cart_items->getCart_items();

        //商品の合計金額を算出
        $total_price = 0;
        foreach ($cart_items as $cart) {
            $total_price += round($cart->price * $tax->percentage) * $cart->count;
        }

        $data = [
            'tax' => $tax,
            'cart_items' => $cart_items,
            'total_price' => $total_price,
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
        //商品がカートにあればレコードを更新、なければレコードを作成
        Cart_item::updateOrInsert(
            ['user_id' => $request->user_id, 'product_id' => $request->product_id],
            ['count' => $request->count]
        );

        //カートページにリダイレクト
        return redirect('login/cart_read');
    }

    /** カートの商品購入数の変更 */
    public function countUp(Request $request)
    {
        // // formの内容を全て取得
        // $form = $request->all();

        /** 購入数の変更*/
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
        $users = $users->orderUser();

        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        $order_check = new Cart_item();
        $order_check = $order_check->getOrder_Check();

        foreach ($order_check as $check) {
            $check->price = round($check->price * $tax->percentage);
        }

        //商品の合計金額を算出
        $total_price = 0;
        foreach ($order_check as $order) {
            $total_price += $order->price * $order->count;
        };

        $data = [
            'tax' => $tax,
            'order_check' => $order_check,
            'total_price' => $total_price,
            'users' => $users,
        ];
        return view('login_EC.order_check', $data);
    }

    /** 購入確認画面での購入数の変更処理*/
    public function order_countUp(Request $request)
    {
        Cart_item::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->update([
                'count' => $request->count,
            ]);
        return redirect('login/order_check');
    }
}
