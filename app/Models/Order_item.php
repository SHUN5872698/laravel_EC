<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Order_item extends Model
{
    /**ガードするフィールド */
    protected $guarded = array('id');

    /**ホワイトリスト */
    protected $fillable = ['product_id', 'order_id', 'name', 'price', 'count'];

    /**
     * orderテーブルとのリレーション
     * @return void
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'id');
    }

    /**
     * productsテーブルとのリレーション
     * @return void
     */
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'name', 'price');
    }

    /**
     * cart_itemsテーブルとのリレーション
     * @return void
     */
    public function cart_item()
    {
        return $this->hasMany('App\Models\Product', 'product_id', 'count');
    }

    /**
     *新規レコードの作成処理
     * @param Request $request
     * @return void
     */
    public function  items_confirmed(Request $request)
    {
        //登録する商品情報の取得
        $products = new Cart_item();
        $products = $products->products_confirmed($request);

        //登録するorder_idの取得
        $order_id = new Order();
        $order_id = $order_id->getOrder_User($request);

        //レコードの作成
        foreach ($products as $product) {
            $order_confirmed = Order_item::create(
                [
                    'product_id' => $product->product_id,
                    'order_id' => $order_id->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'count' => $product->count,
                ],
            );
        }
        return ($order_confirmed);
    }
}
