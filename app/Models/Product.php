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

    /** 商品情報をランダムに取得*/
    public function Products()
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

    /**商品詳細情報の取得 */
    public function getProduct(Request $request)
    {
        $product = Product::with('productimage')
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

    /** category_masterから商品の絞り込みをして取得*/
    public function getMaster(Request $request)
    {
        $master = Product::with('productimage')
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

    /** category情報の取得 */
    public function getCategory(Request $request)
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

    /** categoryから機種を絞り込みをして取得 */
    public function getSearchCategory(Request $request)
    {
        $searchcategory = Product::with('productimage')
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

    /** capacity情報の取得 */
    public function getCapacity(Request $request)
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

    /** capacityから商品情報を絞り込み */
    public function getSearchCapacity(Request $request)
    {
        $searchcapacity = Product::with('productimage')
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
