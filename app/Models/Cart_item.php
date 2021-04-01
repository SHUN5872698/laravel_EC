<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cart_item extends Model
{
    //タイムスタンプを無効化
    public $timestamps = false;

    //ガードするフィールド
    protected $guarded = array('id');

    //usersテーブルとのリレーション
    public function user()
    {
        return $this->hasone('App\User', 'id');
    }

    //productsテーブルとのリレーション
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'id');
    }
    //productimagesテーブルとのリレーション
    public function productimage()
    {
        return $this->hasMany('App\Models\Productimage', 'product_id');
    }

    /**
     * カート情報の抽出
     *
     * @var array
     * カート、商品情報、商品画像のテーブルから抽出
     */
    public function Cart_items()
    {
        $cart_items = Cart_item::with('Product', 'Productimage')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->join('productimages', 'productimages.product_id', '=', 'products.id')
            ->where('cart_items.user_id', Auth::user()->id)
            ->where('productimages.kubun', 'main')
            //カラムの上書きを防ぐため、selectするカラムを具体的に明示する
            ->select(
                'cart_items.id',
                'cart_items.user_id',
                'cart_items.product_id',
                'cart_items.count',
                'products.name',
                'products.price',
                'products.category_master',
                'products.category',
                'products.capacity',
                'productimages.image',
            )
            ->orderby('cart_items.id', 'asc')
            ->paginate(10);
        return $cart_items;
    }

    /**
     * カートのレコード件数の抽出
     *
     * @return void
     */
    public function Cart_count()
    {
        $count = Cart_item::where('user_id', Auth::user()->id)
            ->count();
        return $count;
    }



    /**
     * カート内商品の合計金額を取得
     *
     * @return void
     * カート、商品情報のテーブルから購入数と商品価格を抽出
     * 税率を上乗せして合計金額を取得する
     */
    public function Total_price()
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //合計金額を代入する変数の宣言
        $total_price = 0;

        //購入数と商品価格を抽出
        $items = Cart_item::with('Product')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->where('cart_items.user_id', Auth::user()->id)
            ->select(
                'cart_items.count',
                'products.price',
            )
            ->get();

        //税率を上乗せして合計金額を取得する
        foreach ($items as $item) {
            $total_price += ($item->price  * $tax) * $item->count;
        }
        //合計金額を四捨五入する
        $total_price = round($total_price, -1);
        return $total_price;
    }

    /**
     * カートの作成処理
     *
     * @param Request $request
     * @return void
     * 同一商品がカートに存在していた場合は購入数を追加
     */
    public function Cart_in(Request $request)
    {
        //該当レコードの検索
        $cart_in = Cart_item::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->first();

        //カートに同一の商品がなかった場合、レコードを新規作成
        if ($cart_in == null) {

            // Cart_itemモデルのオブジェクト作成
            $cart_in = new Cart_item();

            // formの内容を全て取得
            $form = $request->all();

            // ユーザーIDはログインユーザーのuser_idを代入
            $form['user_id'] = Auth::user()->id;

            //新規作成して保存
            $cart_in->fill($form)->save();

            //カートページにリダイレクト
            return redirect('login/cart_read');

            //同一商品がテーブルに存在していた場合は購入数に追加してアップデート
        } else if ($cart_in != null) {

            //該当レコードの購入数を追加
            $cart_in->increment('count', $request->count);
        }
        return $cart_in;
    }

    /**
     * 購入数の変更
     *
     * @param Request $request
     * @var array
     */
    public function CountUp(Request $request)
    {
        //ユーザ情報と商品idから該当レコードを検索
        $count_up = Cart_item::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->update([
                'count' => $request->count,
            ]);
        return $count_up;
    }

    /**
     * 商品レコードを一件削除
     *
     * @param Request $request
     * @return void
     */
    public function Delete_one(Request $request)
    {
        //該当商品を検索して実行
        $delete_one = Cart_item::where('user_id', Auth::user()->id)
            ->where('product_id', $request->product_id)
            ->delete();
        return $delete_one;
    }

    /**
     * order_itemsテーブルに登録する商品情報の取得
     * @var array
     * カート、商品情報のテーブルから抽出
     */
    public function order_items()
    {
        $check = Cart_item::with('Product')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->where('cart_items.user_id', Auth::user()->id)
            //カラムを具体的に明示
            ->select(
                'cart_items.product_id',
                'cart_items.count',
                'products.name',
                'products.price',
            )
            ->orderby('cart_items.id', 'asc')
            ->get();

        return $check;
    }

    /**
     * 該当ユーザのcart情報を全て削除
     *
     * @return void
     * 購入処理が完了した場合実行
     */
    public function Delete_cart()
    {
        $delete = Cart_item::where('user_id', Auth::user()->id)
            ->delete();
        return $delete;
    }
}
