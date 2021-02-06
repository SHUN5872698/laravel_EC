<?php

namespace App\Http\Controllers;

use App\Models\Cart_item;
use Illuminate\Http\Request;
use App\User;
use App\Models\Tax;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * カートページに移動
     * @return void
     * 税率、カート内商品とその合計金額を抽出
     */
    public function cart_read()
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //該当ユーザーのカート情報を取得
        $items = new Cart_item();
        $items = $items->Cart_items();

        //カート内件数の取得
        $count = new Cart_item();
        $count = $count->Cart_Count();

        //カート内商品の合計金額を取得
        $total_price = new Cart_item();
        $total_price = $total_price->Total_price();

        $data = [
            'tax' => $tax,
            'items' => $items,
            'count' => $count,
            'total_price' => $total_price,
        ];
        //カートページに移動
        return view('login_EC.login_cart', $data);
    }

    /**
     * カートの作成処理
     * @param Request $request
     * @return void
     * 同じ商品がカートに存在していた場合は購入数を追加
     */
    public function cart_in(Request $request)
    {
        //購入処理を実行
        //同一商品がカートに存在していた場合は購入数を追加
        $cart_in = new Cart_item();
        $cart_in = $cart_in->Cart_in($request);

        //カートページにリダイレクト
        return redirect('login/cart_read');
    }


    /**
     * 購入数の変更
     * @param Request $request
     * @return void
     * リクエストで送信されてきた個数に変更処理を実行
     */
    public function countUp(Request $request)
    {
        //変更処理を実行
        $count_up = new Cart_item();
        $count_up = $count_up->CountUp($request);

        //カートページにリダイレクト
        return redirect('login/cart_read');
    }

    /**
     * 該当の商品の削除処理を実行
     * @param Request $request
     * @return void
     *
     */
    public function delete(Request $request)
    {
        //削除処理を実行
        $delete_one = new Cart_item();
        $delete_one = $delete_one->Delete_one($request);

        //カートページにリダイレクト
        return redirect('login/cart_read');
    }

    /**
     * 購入確認ページ
     * @param Request $request
     * @return void
     * ユーザー情報と商品情報、メイン画像、
     * 税率、カート内商品とその合計金額を抽出
     */
    public function order_check()
    {
        //都道府県情報が必要なのでUserモデルからユーザ情報の取得
        $users = new User();
        $users = $users->User_Data();

        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //カート情報を取得
        $items = new Cart_item();
        $items = $items->Cart_items();

        //カート内件数の取得
        $count = new Cart_item();
        $count = $count->Cart_Count();

        //カート内商品の合計金額を取得
        $total_price = new Cart_item();
        $total_price = $total_price->Total_price();

        $data = [
            'users' => $users,
            'tax' => $tax,
            'items' => $items,
            'count' => $count,
            'total_price' => $total_price,
        ];
        //購入確認ページへ移動
        return view('login_EC.order_check', $data);
    }
}
