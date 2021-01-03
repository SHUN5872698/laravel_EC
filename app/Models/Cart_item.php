<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Cart_item extends Model
{
    public $timestamps = false;

    /**ガードするフィールド */
    protected $guarded = array('id');

    /**
     * usersテーブルとのリレーション
     * @return void
     */
    public function user()
    {
        return $this->hasone('App\User', 'id');
    }
    /**
     * productsテーブルとのリレーション
     * @return void
     */
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'id', 'name', 'description', 'price', 'category_master', 'category', 'capacity');
    }

    /**
     * productimagesテーブルとのリレーション
     * @return void
     */
    public function productimage()
    {
        return $this->hasMany('App\Models\Productimage', 'product_id', 'image', 'kubun');
    }

    /**
     * カート情報の取得
     * @return void
     */
    public function getCart_items()
    {
        $cart_items = Cart_item::with('User', 'Product', 'Productimage')
            ->join('users', 'users.id', '=', 'cart_items.user_id')
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
     * 購入確認のデータ取得
     */
    public function getOrder_Check()
    {
        $order_check = Cart_item::with('User', 'Product')
            ->join('users', 'users.id', '=', 'cart_items.user_id')
            ->join('products', 'products.id', '=', 'cart_items.product_id')
            ->where('cart_items.user_id', Auth::user()->id)
            ->select(
                'cart_items.id',
                'cart_items.count',
                'products.name',
                'products.price',
            )
            ->orderby('cart_items.id', 'asc')
            ->paginate(12);

        return $order_check;
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
