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
        return $this->hasMany('App\Models\Productimage', 'product_id');
    }

    /**
     * 商品情報をランダムに12件取得
     *
     * @return void
     * 商品情報、商品画像のテーブルから抽出
     */
    public function Products()
    {
        $products = Product::with('Productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('productimages.kubun', 'main')
            //カラムの上書きを防ぐため、selectするカラムを具体的に明示する
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
     * 商品情報を一件抽出
     *
     * @param Request $request
     * @return void
     */
    public function One_Product(Request $request)
    {
        $product = Product::where('products.id', $request->id)
            ->first();
        return $product;
    }

    /**
     * 検索されたカテゴリーマスター名を抽出
     *
     * @param Request $request
     * @return void
     */
    public function One_Master(Request $request)
    {
        $one = Product::where('category_master',  $request->category_master)
            ->pluck('category_master')
            ->first();
        return $one;
    }

    /**
     * カテゴリーマスターから商品の絞り込みをして取得
     *
     * @param Request $request
     * @return void
     * 商品情報、商品画像のテーブルから抽出
     */
    public function Master_Products(Request $request)
    {
        $master = Product::with('Productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('products.category_master', $request->category_master)
            ->where('productimages.kubun', 'main')
            //カラムの上書きを防ぐため、selectするカラムを具体的に明示する
            ->select(
                'products.id',
                'products.name',
                'products.price',
                'products.category_master',
                'products.category',
                'products.capacity',
                'productimages.image',
            )
            //昇順に並び替え
            ->orderby('products.id', 'asc')
            ->paginate(12);
        return $master;
    }

    /**
     * カテゴリーマスターで検索したレコード数を取得
     *
     * @param Request $request
     * @return void
     */
    public function Master_Count(Request $request)
    {
        $count = Product::where('category_master', $request->category_master)
            ->count();
        return $count;
    }

    /**
     * 検索されたcategory名を抽出
     *
     * @param Request $request
     * @return void
     * リクエストで送信されたcategory情報を一件取得
     */
    public function One_Category(Request $request)
    {
        $category = Product::where('category',  $request->category)
            ->pluck('category')
            ->first();
        return $category;
    }

    /**
     * category_masterとcategory情報を取得
     *
     * @param Request $request
     * @return void
     *
     */
    public function Deatail_Category(Request $request)
    {
        $category = Product::where('category_master',  $request->category_master)
            ->distinct()
            ->select(
                'category_master',
                'category',
            )
            ->get();
        return $category;
    }

    /**
     * categoryで検索したレコード数を抽出
     *
     * @param Request $request
     * @return void
     */
    public function Category_Count(Request $request)
    {
        $count = Product::where('products.category', $request->category)
            ->count();
        return $count;
    }

    /**
     * categoryで商品情報を検索
     *
     * @param Request $request
     * @return void
     * 商品情報、商品画像のテーブルから抽出
     */
    public function Search_Products(Request $request)
    {
        $searchcategory = Product::with('Productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('products.category', $request->category)
            ->where('productimages.kubun', 'main')
            //カラムの上書きを防ぐため、selectするカラムを具体的に明示する
            ->select(
                'products.id',
                'products.name',
                'products.price',
                'products.category_master',
                'products.category',
                'products.capacity',
                'productimages.image',
            )
            //昇順に並び替え
            ->orderby('products.id', 'asc')
            ->paginate(12);
        return $searchcategory;
    }

    /**
     * 選択された容量とカテゴリー情報を一件取得
     *
     * @param Request $request
     * @return void
     * リクエストで送信されたcategory情報を抽出
     */
    public function One_Capacity(Request $request)
    {
        $capacity = Product::where('capacity',  $request->capacity)
            ->select(
                'category',
                'capacity'
            )
            ->first();
        return $capacity;
    }

    /**
     * 容量で検索した商品情報の取得
     *
     * @param Request $request
     * @return void
     */
    public function Deatail_Capacity(Request $request)
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
     *
     * @param Request $request
     * @return void
     * 商品情報、商品画像のテーブルから抽出
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

    /**
     * capacity検索のレコード数を取得
     *
     * @param Request $request
     * @return void
     */
    public function Count_Capacity(Request $request)
    {
        $count = Product::where('products.category', $request->category)
            ->where('products.capacity', $request->capacity)
            ->count();
        return $count;
    }
}
