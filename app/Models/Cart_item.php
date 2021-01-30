<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cart_item extends Model
{
    /**タイムスタンプを無効化 */
    public $timestamps = false;

    /**ガードするフィールド */
    protected $guarded = array('id');

    /**usersテーブルとのリレーション */
    public function user()
    {
        return $this->hasone('App\User', 'id');
    }

    /**productsテーブルとのリレーション */
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'id');
    }
    /**productimagesテーブルとのリレーション */
    public function productimage()
    {
        return $this->hasMany('App\Models\Productimage', 'product_id');
    }

    /**
     * カート情報の取得
     *
     *@return void
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
     *
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
     *order_itemsテーブルに登録する商品情報の取得
     *
     * @param Request $request
     * @return void
     * 商品名と価格をproductsテーブルから抽出
     */
    public function products_confirmed(Request $request)
    {
        $order_check = Cart_item::with('User', 'Product')
            ->join('users', 'users.id', '=', 'cart_items.user_id')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->where('cart_items.user_id', $request->user_id)
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
     * 該当ユーザのcart情報を削除
     * @param Request $request
     * @return void
     */
    public function delete_cart(Request $request)
    {
        $delete_cart = Cart_item::where('user_id', $request->user_id)
            ->delete();
        return $delete_cart;
    }

    // /** 購入数の変更*/
    // public function CountUp(Request $request)
    // {

    //     $cart_items = Cart_item::where('user_id', Auth::user()->id)
    //         ->where('product_id', $request->product_id)
    //         ->update([
    //             'count' => $request->count,
    //         ]);
    //     dd($cart_items);
    //     return $cart_items;
    // }
}
