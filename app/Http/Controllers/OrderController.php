<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart_item;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;


class OrderController extends Controller
{
    /**
     * 購入処理の実行
     *
     * @return void
     * ordersテーブルに購入者情報を登録
     * order_itemsテーブルに商品情報を登録
     */
    public function order_fixing()
    {
        //ordersテーブルにレコードを新規作成
        $order = new Order();
        $order = $order->Order_add();

        if (is_null($order)) {
            // 該当レコードが存在しない場合はカートページにリダイレクト
            return redirect('login/cart_read');
        } else {
            // 存在する場合は//order_itemsテーブルにレコードを新規作成
            $items = new Order_item();
            $items = $items->Items_add();
        }

        if (is_null($order && $items)) {
            // 登録処理が完了できなかった場合はカートページにリダイレクト
            return redirect('login/cart_read');
        } else {
            // 完了した場合該当ユーザーのカートテーブルのレコードを全て削除
            $delete_cart = new Cart_item();
            $delete_cart = $delete_cart->Delete_cart();

            //購入履歴ページへリダイレクト
            return redirect('/login/order_history');
        }
    }

    /**
     * 購入履歴閲覧
     *
     * @param Request $request
     * @return void
     *
     * 購入者情報と購入商品の情報を取得
     */
    public function order_history(Request $request)
    {
        //購入履歴を取得
        $orders = new Order();
        $orders = $orders->Order_History($request);

        //配列にデータを格納
        $data = [
            'orders' => $orders,
        ];
        //購入履歴画面に変数の受け渡し
        return view('login_EC.order_histories', $data);
    }
}
