<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Order_item extends Model
{
    /**ガードするフィールド */
    protected $guarded = array('id');

    /**ホワイトリスト */
    // protected $fillable = ['product_id', 'order_id', 'name', 'price', 'count'];

    /** orderテーブルとのリレーション*/
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'id');
    }

    /** productsテーブルとのリレーション*/
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id');
    }

    /** productimagesテーブルとのリレーション*/
    public function productimage()
    {
        return $this->belongsTo('App\Models\Productimage');
    }

    /**cart_itemsテーブルとのリレーション*/
    public function cart_item()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * 新規レコードの作成処理
     *
     * @return void
     * 購入者情報、カート、商品のテーブルから抽出
     * 抽出したデータからレコードを作成
     */
    public function  Items_add()
    {
        //登録する商品情報の取得
        $items = new Cart_item();
        $items = $items->order_items();

        //登録するorder_idを取得
        $order_id = new Order();
        $order_id = $order_id->Order_id();

        //レコードの作成
        foreach ($items as $item) {
            $order_add = Order_item::create(
                [
                    'product_id' => $item->product_id,
                    'order_id' => $order_id,
                    'name' => $item->name,
                    'price' => $item->price,
                    'count' => $item->count,
                ],
            );
        }
        return ($order_add);
    }
}
