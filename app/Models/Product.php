<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Product extends Model
{
    /**ガードするフィールド */
    protected $guarded = array('id');

    /**productimagesテーブルとのリレーション*/
    public function productimage()
    {
        return $this->hasMany('App\Models\Productimage', 'product_id', 'image', 'kubun');
    }

    /** 商品情報をランダムに12件取得*/
    public function Products()
    {
        $products = Product::with('Productimage')
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

    /**
     * 商品詳細情報の取得
     * @param Request $request
     * @return void
     */
    public function OneProduct(Request $request)
    {
        $product = Product::with('Productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('products.id', $request->id)
            ->select(
                'products.id',
                'products.name',
                'products.description',
                'products.price',
                'products.category_master',
                'products.category',
                'products.capacity',
                'productimages.image',
            )
            ->orderBy('productimages.id', 'asc')
            ->get();
        return $product;
    }

    /**
     *カテゴリーマスターから商品の絞り込みをして取得
     * @param Request $request
     * @return void
     */
    public function Master(Request $request)
    {
        $master = Product::with('Productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('products.category_master', $request->category_master)
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
            ->orderby('products.id', 'asc')
            ->paginate(12);
        return $master;
    }

    /**
     * category情報の取得
     * @param Request $request
     * @return void
     */
    public function Category(Request $request)
    {
        $category = Product::where('category_master', 'like', $request->category_master . '%')
            ->distinct()
            ->select(
                'category',
                'category_master',
            )
            ->get();
        return $category;
    }

    /**
     *categoryから機種を絞り込みをして取得
     * @param Request $request
     * @return void
     */
    public function SearchCategory(Request $request)
    {
        $searchcategory = Product::with('Productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('products.category', $request->category)
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
            ->orderby('products.id', 'asc')
            ->paginate(12);
        return $searchcategory;
    }

    /**
     * capacity情報の取得
     * @param Request $request
     * @return void
     */
    public function Capacity(Request $request)
    {
        $capacity = Product::where('category', $request->category)
            ->distinct()
            ->select(
                'category_master',
                'category',
                'capacity',
            )
            ->get();
        return $capacity;
    }

    /**
     * capacityから商品情報を絞り込み
     * @param Request $request
     * @return void
     */
    public function SearchCapacity(Request $request)
    {
        $searchcapacity = Product::with('Productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('products.category', $request->category)
            ->where('products.capacity', $request->capacity)
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
            ->orderby('products.id', 'asc')
            ->paginate(12);
        return $searchcapacity;
    }
}
