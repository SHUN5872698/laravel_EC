<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use App\Models\Tax;

class ProductController extends Controller
{
    /**メインページに移動 */
    public function main(Request $request)
    {
        //現在の税率の取得
        $Tax = new Tax();
        $Tax = $Tax->getTax();

        $products = Product::with('productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
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
            ->inRandomOrder()
            ->take(12)
            ->get();

        $data = [
            'products' => $products,
            'Tax' => $Tax,
        ];

        // dd($data);
        return view('EC.main', $data);
    }

    /**ログイン済みのメインページに移動 */
    public function login_main(Request $request)
    {
        return view('login_EC.login_main');
    }
}
