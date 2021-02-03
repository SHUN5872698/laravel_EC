<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tax;
use App\Models\Productimage;

class ProductController extends Controller
{
    /**
     * メインページ
     * @return void
     * 商品をランダムに12件抽出
     */
    public function main()
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //商品情報と画像データをランダムに12件取得
        $products = new Product();
        $products = $products->Products();

        $data = [
            'products' => $products,
            'tax' => $tax,
        ];
        return view('EC.main', $data);
    }

    /**
     * 商品概要ページ
     * @param Request $request
     * @return void
     *
     * 該当商品の商品情報と商品画像、関連するカテゴリー情報を抽出
     */
    public function product(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //商品情報の取得
        $products = new Product();
        $products = $products->One_Product($request);

        //商品画像の取得
        $images = new Productimage();
        $images = $images->Images($request);

        //カテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        $data = [
            'tax' => $tax,
            'products' => $products,
            'images' => $images,
            'categorys' => $categorys,
        ];
        return view('EC.product', $data);
    }


    /**
     * 検索ページ
     * @param Request $request
     * @return void
     *
     * category_masterで検索された結果から
     * 商品データや検索欄の情報を抽出
     */
    public function master(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //検索されたカテゴリーマスター名を取得
        $one_master = new Product();
        $one_master = $one_master->One_Master($request);

        //検索結果数の取得
        $count = new Product();
        $count = $count->Master_Count($request);

        //カテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        //商品情報の取得
        $products = new Product();
        $products = $products->Master_Products($request);

        $data = [
            'tax' => $tax,
            'one_master' => $one_master,
            'count' => $count,
            'products' => $products,
            'categorys' => $categorys,
        ];
        return view('EC.search', $data);
    }

    /**
     * 詳細検索ページ
     * @param Request $request
     * @return void
     *
     * categoryで検索された結果から
     * 商品データや検索欄の情報を抽出
     */
    public function category(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //検索されたカテゴリー名の取得
        $one_category = new Product();
        $one_category = $one_category->One_Category($request);

        //検索結果数の取得
        $count = new Product();
        $count = $count->Category_Count($request);

        //category情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        //容量情報の取得
        $capacitys = new Product();
        $capacitys = $capacitys->Deatail_Capacity($request);

        //カテゴリーから商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->Search_Products($request);

        $data = [
            'tax' => $tax,
            'one_category' => $one_category,
            'count' => $count,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
            'products' => $products,
        ];
        return view('EC.deatail', $data);
    }


    /**
     * 詳細検索ページ
     * @param Request $request
     * @return void
     *
     * capacityで検索された結果から
     * 商品データや検索欄の情報を抽出
     */
    public function capacity(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //検索結果数の取得
        $one_capacity = new Product();
        $one_capacity = $one_capacity->One_Capacity($request);

        //検索結果数を取得
        $count = new Product();
        $count = $count->Count_Capacity($request);

        //カテゴリー情報を複数取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        //容量情報の取得
        $capacitys = new Product();
        $capacitys = $capacitys->Deatail_Capacity($request);

        //容量から商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->SearchCapacity($request);

        $data = [
            'one_capacity' => $one_capacity,
            'count' => $count,
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        return view('EC.deatail', $data);
    }


    /**
     * ログイン済みのメインページ
     * @return void
     * 商品をランダムに12件抽出
     */
    public function login_main()
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //商品情報と画像データをランダムに12件取得
        $products = new Product();
        $products = $products->Products();

        $data = [
            'products' => $products,
            'tax' => $tax,
        ];
        return view('login_EC.login_main', $data);
    }

    /**
     * ログイン済みの商品概要ページ
     * @param Request $request
     * @return void
     *
     * 該当商品の商品情報と商品画像、関連するカテゴリー情報を抽出
     */
    public function login_product(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //商品情報の取得
        $products = new Product();
        $products = $products->One_Product($request);

        //商品画像の取得
        $images = new Productimage();
        $images = $images->Images($request);

        //カテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        $data = [
            'tax' => $tax,
            'products' => $products,
            'images' => $images,
            'categorys' => $categorys,
        ];
        return view('login_EC.login_product', $data);
    }

    /**
     * ログイン済みの検索ページ
     * @param Request $request
     * @return void
     *
     * category_masterで検索された結果から
     * 商品データや検索欄の情報を抽出
     */
    public function login_master(Request $request)
    {
        ///現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //検索されたカテゴリーマスター名を取得
        $one_master = new Product();
        $one_master = $one_master->One_Master($request);

        //検索結果数の取得
        $count = new Product();
        $count = $count->Master_Count($request);

        //カテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        //商品情報の取得
        $products = new Product();
        $products = $products->Master_Products($request);

        $data = [
            'tax' => $tax,
            'one_master' => $one_master,
            'count' => $count,
            'products' => $products,
            'categorys' => $categorys,
        ];
        return view('login_EC.login_search', $data);
    }

    /**
     * ログイン済みの詳細検索ページ
     * @param Request $request
     * @return void
     *
     * categoryで検索された結果から
     * 商品データや検索欄の情報を抽出
     */
    public function login_category(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //検索されたカテゴリー名の取得
        $one_category = new Product();
        $one_category = $one_category->One_Category($request);

        //検索結果数の取得
        $count = new Product();
        $count = $count->Category_Count($request);

        //category情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        //容量情報の取得
        $capacitys = new Product();
        $capacitys = $capacitys->Deatail_Capacity($request);

        //カテゴリーから商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->Search_Products($request);

        $data = [
            'tax' => $tax,
            'one_category' => $one_category,
            'count' => $count,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
            'products' => $products,
        ];
        return view('login_EC.login_details', $data);
    }

    /**
     * ログイン済みの詳細検索ページ
     * @param Request $request
     * @return void
     *
     * capacityで検索された結果から
     * 商品データや検索欄の情報を抽出
     */
    public function login_capacity(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //検索結果数の取得
        $one_capacity = new Product();
        $one_capacity = $one_capacity->One_Capacity($request);

        //検索結果数を取得
        $count = new Product();
        $count = $count->Count_Capacity($request);

        //カテゴリー情報を複数取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        //容量情報の取得
        $capacitys = new Product();
        $capacitys = $capacitys->Deatail_Capacity($request);

        //容量から商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->SearchCapacity($request);

        $data = [
            'one_capacity' => $one_capacity,
            'count' => $count,
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        return view('login_EC.login_details', $data);
    }
}
