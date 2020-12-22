<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**メインページに移動 */
    public function main(Request $request)
    {
        $products = Product::with('productimage')
            ->join('productimages', 'product_id',  '=', 'products.id')
            ->where('products.id', 1)
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
            ->paginate(10);
        $data = [
            'products' => $products,
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
