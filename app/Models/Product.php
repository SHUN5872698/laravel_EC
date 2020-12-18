<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use app\Models\Productimage;

class Product extends Model
{
    /**ガードするフィールド */
    protected $guarded = array('id');

    /**
     * productimagesテーブルとのリレーション
     * @return void
     */
    public function productimage()
    {
        return $this->hasMany('App\Models\Productimage', 'product_id', 'image', 'kubun');
    }

    /**
     * 商品情報と画像データの取得処理
     */
    public function getData()
    {
        $data = Product::with('productimages')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('products.id', 1)
            ->select(
                'products.id',
                'products.name',
                'products.description',
                'products.price',
                'products.category_master',
                'products.category',
                'products.capacity',
                'productimages.product_id',
                'productimages.image',
                'productimages.kubun',
            )
            ->paginate(10);
        $data = [
            'data' => $data,
        ];
    }
}
