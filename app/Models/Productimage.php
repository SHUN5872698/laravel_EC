<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Productimage extends Model
{
    /** productsテーブルとのリレーション*/
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * 商品画像の取得
     * @param Request $request
     * @return void
     * 該当商品の画像をid順に並び替えて抽出
     */
    public function Images(Request $request)
    {
        $images = Productimage::where('product_id', $request->id)
            ->orderBy('id', 'asc')
            ->pluck('image');
        return $images;
    }
}
