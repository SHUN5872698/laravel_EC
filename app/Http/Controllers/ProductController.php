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
     *　現在の税率と商品情報をランダムに取得する
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
        $products = $products->getProducts();

        $data = [
            'products' => $products,
            'Tax' => $tax,
        ];
        return view('EC.main', $data);
    }

    /**
     * masterカテゴリーから商品の絞り込みをして表示する
     * @param Request $request
     * @return void
     */
    public function master(Request $request)
    {
        //現在の税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //masterカテゴリーから商品の絞り込みをして表示する
        $master = new Product();
        $master = $master->getMaster($request);

        $data = [
            'master' => $master,
            'Tax' => $tax,
        ];
        return view('EC.search', $data);
    }


    /**ログイン済みのメインページに移動 */
    public function login_main(Request $request)
    {
        return view('login_EC.login_main');
    }
}
