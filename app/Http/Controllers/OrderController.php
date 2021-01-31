<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart_item;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * 購入された商品とユーザー情報の登録処理
     * @return void
     * ordersテーブルに購入者情報を登録
     * order_itemsテーブルに商品情報と購入数を登録
     */
    public function order_fixing()
    {
        //ordersテーブルにレコードを新規作成
        $order = new Order();
        $order = $order->Order_add();

        if (is_null($order)) {
            //該当レコードが存在しない場合はカートページにリダイレクト
            return redirect('login/cart_read');
        } else {

            //存在する場合は//order_itemsテーブルにレコードを新規作成
            $items = new Order_item();
            $items = $items->Items_add();
        }

        if (is_null($order && $items)) {
            //2つのテーブルに登録処理ができなかった場合はカートページにリダイレクト
            return redirect('login/cart_read');
        } else {

            //存在する場合は該当ユーザーのカート情報を削除を実行
            $delete_cart = new Cart_item();
            $delete_cart = $delete_cart->Delete_cart();

            //購入履歴ページにリダイレクト
            return redirect('/login/order_history');
        }
    }

    /**
     * 購入履歴の取得
     * @return void
     * ログインしているユーザー情報から購入者情報を抽出
     */
    public function Order_History()
    {
        //購入者情報と購入商品の情報を取得
        $orders = new Order();
        $orders = $orders->Order_History();

        $data = [
            'orders' => $orders,
        ];
        return view('login_EC.order_histories', $data);
    }
}
