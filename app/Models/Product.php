<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


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

    /** 商品情報と画像データをランダムに取得*/
    public function getProducts()
    {
        $products = Product::with('productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('productimages.kubun', 'main')
            ->select(
                'products.id',
                'products.name',
                'products.price',
                'products.category_master',
                'products.category',
                'products.capacity',
                'productimages.image',
            )
            //商品をランダムに12件取得
            ->inRandomOrder()
            ->take(12)
            ->get();
        return $products;
    }

    /** masterカテゴリーから商品の絞り込みをして表示する*/
    public function getMaster(Request $request)
    {
        $master = Product::with('productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('products.category_master', $request->master)
            ->where('productimages.kubun', 'main')
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
            )
            ->paginate(12);
        return $master;
    }
}
