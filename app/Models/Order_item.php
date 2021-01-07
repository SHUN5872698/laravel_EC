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
    public function order_items()
    {
        return $this->belongsTo('App\Models\order', 'id');
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

    public function items_confirmed(Request $request)
    {
        //登録する商品情報の取得
        $products_confirmed = new Cart_item();
        $products_confirmed = $products_confirmed->products_confirmed($request);

        //登録するorder_idの取得
        $order_id = new Order();
        $order_id = $order_id->getorder_User($request);

        foreach ($products_confirmed as $confirmed) {
            $order_confirmed = Order_item::create(
                [
                    'product_id' => $confirmed->product_id,
                    'order_id' => $order_id->id,
                    'name' => $confirmed->name,
                    'price' => $confirmed->price,
                    'count' => $confirmed->count,
                ],
            );
        }
        return ($order_confirmed);
    }
}
