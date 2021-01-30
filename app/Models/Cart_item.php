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
     * カート情報の取得
     * @return void
     *
     * ログインしているユーザーのidからcart情報を抽出
     * 商品に紐づいている商品情報やメイン画像を抽出
     */
    public function Cart_items()
    {
        $cart_items = Cart_item::with('Product', 'Productimage')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->join('productimages', 'productimages.product_id', '=', 'products.id')
            ->where('cart_items.user_id', Auth::user()->id)
            ->where('productimages.kubun', 'main')
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
            ->paginate(12);
        return $cart_items;
    }

    /**
     * カート内商品の合計金額の作成
     * @return void
     */
    public function totalprice()
    {
        $totalprice = 0;
        $items = Cart_item::with('Product')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->where('cart_items.user_id', Auth::user()->id)
            ->select(
                'cart_items.count',
                'products.price',
            )
            ->get();
        foreach ($items as $item) {
            $totalprice += $item->price  * $item->count;
        }
        return $totalprice;
    }

    /**
     * カートの作成処理
     * @param Request $request
     * @return void
     * 同じ商品がカートに存在していた場合は購入数を追加
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
     * @param Request $request
     * @return void
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
     * @param Request $request
     * @return void
     * 商品名と価格をproductsテーブルから抽出
     */
    public function products_confirmed(Request $request)
    {
        $order_check = Cart_item::with('User', 'Product')
            ->join('users', 'users.id', '=', 'cart_items.user_id')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->where('cart_items.user_id', Auth::user()->id)
            ->select(
                'cart_items.product_id',
                'cart_items.count',
                'products.name',
                'products.price',
            )
            ->orderby('cart_items.id', 'asc')
            ->get();

        return $order_check;
    }

    /**
     * 該当ユーザのcart情報を全て削除
     * @param Request $request
     * @return void
     */
    public function delete_cart(Request $request)
    {
        $delete = Cart_item::where('user_id', Auth::user()->id)
            ->delete();
        return $delete;
    }
}
