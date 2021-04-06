<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tax;
use App\Models\Productimage;

class ProductController extends Controller
{
    /**
     * メイン（スタート）ページ
     *
     * @return void
     */
    public function main()
    {
        // 現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        // 商品情報をランダムに12件取得
        $products = new Product();
        $products = $products->Products();

        //配列にデータを格納
        $data = [
            'tax' => $tax,
            'products' => $products,
        ];
        //メインページに変数の受け渡し
        return view('EC.main', $data);
    }

    /**
     * 商品概要ページ
     *
     * @param Request $request
     * @return void
     */
    public function product(Request $request)
    {
        // 現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        // 選択された商品情報を取得
        $products = new Product();
        $products = $products->One_Product($request);

        // 選択された商品画像を取得
        $images = new Productimage();
        $images = $images->Images($request);

        // カテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        // 配列にデータを格納
        $data = [
            'tax' => $tax,
            'products' => $products,
            'images' => $images,
            'categorys' => $categorys,
        ];

        //商品概要ページに変数の受け渡し
        return view('EC.product', $data);
    }


    /**
     * 検索ページ
     *
     * @param Request $request
     * @return void
     * category_masterで検索された結果から商品情報を取得
     */
    public function master(Request $request)
    {
        // 現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        // 商品情報を取得
        $products = new Product();
        $products = $products->Master_Products($request);

        // 検索された商品のレコード数を取得
        $count = new Product();
        $count = $count->Master_Count($request);

        // 検索された商品のカテゴリーマスター名を取得
        $one_master = new Product();
        $one_master = $one_master->One_Master($request);

        // 検索された商品に関連するカテゴリーマスターとカテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        // 配列にデータを格納
        $data = [
            'tax' => $tax,
            'products' => $products,
            'count' => $count,
            'one_master' => $one_master,
            'categorys' => $categorys,
        ];

        // 検索ページに変数の受け渡し
        return view('EC.search', $data);
    }

    /**
     * 詳細検索ページ(カテゴリーで検索)
     *
     * @param Request $request
     * @return void
     * categoryで検索された結果から商品情報を取得
     */
    public function category(Request $request)
    {
        // 現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        // 商品情報を取得
        $products = new Product();
        $products = $products->Search_Products($request);

        // 検索された商品のレコード数を取得
        $count = new Product();
        $count = $count->Category_Count($request);

        // 検索された商品のカテゴリー名を取得
        $one_category = new Product();
        $one_category = $one_category->One_Category($request);

        // 検索された商品に関連するカテゴリーマスターとカテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        // 検索された商品に関連する容量情報を取得
        $capacitys = new Product();
        $capacitys = $capacitys->Deatail_Capacity($request);

        //配列にデータを格納
        $data = [
            'tax' => $tax,
            'products' => $products,
            'count' => $count,
            'one_category' => $one_category,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        //詳細検索ページに変数の受け渡し
        return view('EC.deatail', $data);
    }


    /**
     * 詳細検索ページ(容量で検索)
     * @param Request $request
     * @return void
     *
     * capacityで検索された結果から商品情報を取得
     */
    public function capacity(Request $request)
    {
        // 現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        // 商品情報を取得
        $products = new Product();
        $products = $products->SearchCapacity($request);

        // 検索された商品のレコード数を取得
        $count = new Product();
        $count = $count->Count_Capacity($request);

        // 検索された商品に関連するカテゴリー名を取得
        $one_capacity = new Product();
        $one_capacity = $one_capacity->One_Capacity($request);

        // 検索された商品に関連するカテゴリーマスターとカテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        // 検索された商品に関連する容量情報を取得
        $capacitys = new Product();
        $capacitys = $capacitys->Deatail_Capacity($request);

        // 配列にデータを格納
        $data = [
            'tax' => $tax,
            'products' => $products,
            'count' => $count,
            'one_capacity' => $one_capacity,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        // 詳細検索ページに変数の受け渡し
        return view('EC.deatail', $data);
    }

    /**
     * ログイン済みのメインページ
     *
     * @return void
     */
    public function login_main()
    {
        // 現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        // 商品情報をランダムに12件取得
        $products = new Product();
        $products = $products->Products();

        //配列にデータを格納
        $data = [
            'tax' => $tax,
            'products' => $products,
        ];
        //ログイン済みのメインページに変数の受け渡し
        return view('login_EC.login_main', $data);
    }

    /**
     * ログイン済みの商品概要ページ
     *
     * @param Request $request
     * @return void
     */
    public function login_product(Request $request)
    {
        // 現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        // 選択された商品情報を取得
        $products = new Product();
        $products = $products->One_Product($request);

        // 選択された商品画像を取得
        $images = new Productimage();
        $images = $images->Images($request);

        // カテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        // 配列にデータを格納
        $data = [
            'tax' => $tax,
            'products' => $products,
            'images' => $images,
            'categorys' => $categorys,
        ];

        //ログイン済みの商品概要ページに変数の受け渡し
        return view('login_EC.login_product', $data);
    }

    /**
     * ログイン済みの検索ページ
     *
     * @param Request $request
     * @return void
     */
    public function login_master(Request $request)
    {
        // 現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        // 商品情報を取得
        $products = new Product();
        $products = $products->Master_Products($request);

        // 検索された商品のレコード数を取得
        $count = new Product();
        $count = $count->Master_Count($request);

        // 検索された商品のカテゴリーマスター名を取得
        $one_master = new Product();
        $one_master = $one_master->One_Master($request);

        // 検索された商品に関連するカテゴリーマスターとカテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        // 配列にデータを格納
        $data = [
            'tax' => $tax,
            'products' => $products,
            'count' => $count,
            'one_master' => $one_master,
            'categorys' => $categorys,
        ];
        // ログイン済みの検索ページ検索ページに変数の受け渡し
        return view('login_EC.login_search', $data);
    }

    /**
     * ログイン済みの詳細検索ページ(カテゴリーで検索)
     *
     * @param Request $request
     * @return void
     * categoryで検索された結果から商品情報を取得
     */
    public function login_category(Request $request)
    {
        // 現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        // 商品情報を取得
        $products = new Product();
        $products = $products->Search_Products($request);

        // 検索された商品のレコード数を取得
        $count = new Product();
        $count = $count->Category_Count($request);

        // 検索された商品のカテゴリー名を取得
        $one_category = new Product();
        $one_category = $one_category->One_Category($request);

        // 検索された商品に関連するカテゴリーマスターとカテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        // 検索された商品に関連する容量情報を取得
        $capacitys = new Product();
        $capacitys = $capacitys->Deatail_Capacity($request);

        //配列にデータを格納
        $data = [
            'tax' => $tax,
            'products' => $products,
            'count' => $count,
            'one_category' => $one_category,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        //ログイン済みの詳細検索ページに変数の受け渡し
        return view('login_EC.login_details', $data);
    }

    /**
     * ログイン済みの詳細検索ページ(容量で検索)
     * @param Request $request
     * @return void
     *
     * capacityで検索された結果から商品情報を取得
     */
    public function login_capacity(Request $request)
    {
        // 現在の税率を取得
        $tax = new Tax();
        $tax = $tax->getTax();

        // 商品情報を取得
        $products = new Product();
        $products = $products->SearchCapacity($request);

        // 検索された商品のレコード数を取得
        $count = new Product();
        $count = $count->Count_Capacity($request);

        // 検索された商品に関連するカテゴリー名を取得
        $one_capacity = new Product();
        $one_capacity = $one_capacity->One_Capacity($request);

        // 検索された商品に関連するカテゴリーマスターとカテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Deatail_Category($request);

        // 検索された商品に関連する容量情報を取得
        $capacitys = new Product();
        $capacitys = $capacitys->Deatail_Capacity($request);

        // 配列にデータを格納
        $data = [
            'tax' => $tax,
            'products' => $products,
            'count' => $count,
            'one_capacity' => $one_capacity,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        // ログイン済みの詳細検索ページに変数の受け渡し
        return view('login_EC.login_details', $data);
    }
}
