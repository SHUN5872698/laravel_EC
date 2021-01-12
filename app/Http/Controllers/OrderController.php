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
     * @param Request $request
     * @return void
     */
    public function order_confirmed(Request $request)
    {
        //ordersテーブルにレコードを新規作成
        $order_confirmed = new Order();
        $order_confirmed = $order_confirmed->order_confirmed($request);

        //order_itemsテーブルにレコードを新規作成
        $items_confirmed = new Order_item();
        $items_confirmed = $items_confirmed->items_confirmed($request);
        if (is_null($order_confirmed && $items_confirmed)) {
            //該当レコードが存在しない場合はカートページにリダイレクト
            return redirect('login/cart_read');
        } else {
            //存在する場合は該当ユーザーのcart情報を削除
            $delete_cart = new Cart_item();
            $delete_cart = $delete_cart->delete_cart($request);
            //購入履歴ページにリダイレクト
            return redirect('login/cart_read');
        }
    }

    /**
     * 購入履歴の取得
     * @return void
     */
    public function Order_History()
    {
        $order_History = new Order();
        $order_History = $order_History->Order_History();

        $data = [
            'order_History' => $order_History,
        ];
        return view('login_EC.order_history', $data);
    }
}
