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
     * カート内商品確認ページ
     *
     * @return void
     */
    public function cart_read()
    {
        //現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //該当ユーザーのカート情報を取得
        $items = new Cart_item();
        $items = $items->Cart_items();

        //カートのレコード件数を取得
        $count = new Cart_item();
        $count = $count->Cart_count();

        //カート内商品の合計金額を取得
        $total_price = new Cart_item();
        $total_price = $total_price->Total_price();

        //配列にデータを格納
        $data = [
            'tax' => $tax,
            'items' => $items,
            'count' => $count,
            'total_price' => $total_price,
        ];

        //カートページに変数の受け渡し
        return view('login_EC.cart', $data);
    }

    /**
     * カートの作成処理
     *
     * @param Request $request
     * @return void
     * 同じ商品がカートに存在していた場合は購入数を追加
     */
    public function cart_in(Request $request)
    {
        // カートテーブルに新規登録処理を実行
        // カートテーブルに同一商品が存在していた場合は購入数を追加
        $cart_in = new Cart_item();
        $cart_in = $cart_in->Cart_in($request);

        //カートページにリダイレクト
        return redirect('login/cart_read');
    }


    /**
     * カート内商品の数量を変更
     *
     * @param Request $request
     * @return void
     */
    public function countUp(Request $request)
    {
        //カート内の商品の数量変更処理を実行
        $count_up = new Cart_item();
        $count_up = $count_up->CountUp($request);

        //カートページにリダイレクト
        return redirect('login/cart_read');
    }

    /**
     * カート内商品を一件削除
     *
     * @param Request $request
     * @return void
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
     *
     * @return void
     *
     */
    public function order_check()
    {
        //ユーザ情報を取得
        $users = new User();
        $users = $users->User_Data();

        //現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //カート情報を取得
        $items = new Cart_item();
        $items = $items->Cart_items();

        //カート内レコード数を取得
        $count = new Cart_item();
        $count = $count->Cart_count();

        //カート内商品の合計金額を取得
        $total_price = new Cart_item();
        $total_price = $total_price->Total_price();

        //配列にデータを格納
        $data = [
            'users' => $users,
            'tax' => $tax,
            'items' => $items,
            'count' => $count,
            'total_price' => $total_price,
        ];
        //購入確認ページへ変数の受け渡し
        return view('login_EC.order_check', $data);
    }
}
