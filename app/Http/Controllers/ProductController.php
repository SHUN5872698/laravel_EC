<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Tax;

class ProductController extends Controller
{

    /**
     * メインページ
     * @param Request $request
     * @return void
     */
    public function main(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //商品情報と画像データをランダムに取得
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
     */
    public function product(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //商品情報の取得
        $products = new Product();
        $products = $products->getProduct($request);

        //category情報を取得して表示する
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
     * category_masterから商品の絞り込みをして表示する
     * @param Request $request
     * @return void
     */
    public function master(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //category_masterから商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->getMaster($request);

        //category情報を取得して表示する
        $categorys = new Product();
        $categorys = $categorys->getCategory($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
        ];
        return view('EC.search', $data);
    }

    /**
     * categoryから商品の絞り込みをして取得
     * @param Request $request
     * @return void
     */
    public function category(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //category情報の取得
        $categorys = new Product();
        $categorys = $categorys->getCategory($request);

        //capacity情報の取得
        $capacitys = new Product();
        $capacitys = $capacitys->getCapacity($request);

        //categoryから商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->getSearchCategory($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        return view('EC.deatail', $data);
    }

    /**
     * capacityから商品の絞り込みをして取得
     *
     * @param Request $request
     * @return void
     */
    public function capacity(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //category情報の取得
        $categorys = new Product();
        $categorys = $categorys->getCategory($request);

        //capacity情報の取得
        $capacitys = new Product();
        $capacitys = $capacitys->getCapacity($request);

        //capacityから商品の絞り込みをして取得する
        $products = new Product();
        $products = $products->getSearchCapacity($request);

        $data = [
            'products' => $products,
            'tax' => $tax,
            'categorys' => $categorys,
            'capacitys' =>  $capacitys,
        ];
        return view('EC.deatail', $data);
    }

    /**ログイン済みのメインページに移動 */
    public function login_main(Request $request)
    {
        return view('login_EC.login_main');
    }
}
