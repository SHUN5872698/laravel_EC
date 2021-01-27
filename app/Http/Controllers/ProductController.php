<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Tax;

class ProductController extends Controller
{
    /**メインページ
     * 現在の税率、商品ををランダムに12件、商品と紐づいたメイン画像を抽出
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
     * 商品の詳細ページ
     * @param Request $request
     * @return void
     * 該当商品の商品情報と商品画像、関連するカテゴリー情報を抽出
     */
    public function product(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //商品情報の取得
        $products = new Product();
        $products = $products->OneProduct($request);

        //カテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->getCategory($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
        ];
        return view('EC.product', $data);
    }

    /**
     * カテゴリー検索ページ
     * @param Request $request
     * @return void
     * カテゴリーマスターから商品の絞り込みをして抽出
     */
    public function master(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //カテゴリーマスターから商品の絞り込み
        $products = new Product();
        $products = $products->Master($request);

        //category情報を取得
        $categorys = new Product();
        $categorys = $categorys->Category($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
        ];
        return view('EC.search', $data);
    }

    /**
     * 商品詳細ページ
     * @param Request $request
     * @return void
     * カテゴリーから絞り込みをしてレコードを抽出
     */
    public function category(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //カテゴリー情報の取得
        $categorys = new Product();
        $categorys = $categorys->Category($request);

        //容量情報の取得
        $capacitys = new Product();
        $capacitys = $capacitys->Capacity($request);

        //カテゴリーから商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->SearchCategory($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        return view('EC.deatail', $data);
    }

    /**
     * 商品詳細ページ
     * @param Request $request
     * @return void
     * 容量から商品の絞り込みをしてレコードを抽出
     */
    public function capacity(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //カテゴリー情報の取得
        $categorys = new Product();
        $categorys = $categorys->Category($request);

        //容量情報の取得
        $capacitys = new Product();
        $capacitys = $capacitys->Capacity($request);

        //容量から商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->SearchCapacity($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        return view('EC.deatail', $data);
    }

    /**
     * ログイン済みのメインページ
     * 現在の税率、商品ををランダムに12件、商品と紐づいたメイン画像を抽出
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
     * ログイン済みの商品の詳細ページ
     * @param Request $request
     * @return void
     * 該当商品の商品情報と商品画像、関連するカテゴリー情報を抽出
     */
    public function login_product(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //商品情報の取得
        $products = new Product();
        $products = $products->OneProduct($request);

        //カテゴリー情報を取得して表示する
        $categorys = new Product();
        $categorys = $categorys->Category($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
        ];
        return view('login_EC.login_product', $data);
    }

    /**
     * ログイン済みのカテゴリー検索ページ
     * @param Request $request
     * @return void
     * カテゴリーマスターから商品の絞り込みをして抽出
     */
    public function login_master(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //カテゴリーマスターから商品の絞り込み
        $products = new Product();
        $products = $products->Master($request);

        //カテゴリー情報を取得
        $categorys = new Product();
        $categorys = $categorys->Category($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
        ];
        return view('login_EC.login_search', $data);
    }

    /**
     * ログイン済みの商品詳細ページ
     * @param Request $request
     * @return void
     * カテゴリーから絞り込みをしてレコードを抽出
     */
    public function login_category(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //カテゴリー情報の取得
        $categorys = new Product();
        $categorys = $categorys->Category($request);

        //容量情報の取得
        $capacitys = new Product();
        $capacitys = $capacitys->Capacity($request);

        //カテゴリーから商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->SearchCategory($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        return view('login_EC.login_details', $data);
    }

    /**
     * 商品詳細ページ
     * @param Request $request
     * @return void
     * 容量から商品の絞り込みをしてレコードを抽出
     */
    public function login_capacity(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //カテゴリー情報の取得
        $categorys = new Product();
        $categorys = $categorys->Category($request);

        //容量情報の取得
        $capacitys = new Product();
        $capacitys = $capacitys->Capacity($request);

        //容量から商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->SearchCapacity($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        return view('login_EC.login_details', $data);
    }
}
