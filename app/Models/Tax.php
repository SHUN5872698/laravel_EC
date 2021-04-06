<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tax extends Model
{
    /**ガードするフィールド */
    protected $guarded = array('id');

    /**
     * 商品価格に上乗せする値を取得
     *
     * @return void
     * 現在日時から税率を取得して変換
     */
    public function getTax()
    {
        $tax = Tax::whereDate('taxes.from', '<=', Carbon::now()->format('Y-m-d'))
            ->orderby('taxes.from', 'desc')
            ->pluck('percentage')
            ->first();

        //percentageを変換
        $tax = ($tax + 100) / 100;
        return $tax;
    }

    /**
     * 現在の税率を取得
     *
     * @return void
     * orderテーブルに登録するために使用
     */
    public function percentage()
    {
        $percentage = Tax::whereDate('taxes.from', '<=', Carbon::now()->format('Y-m-d'))
            ->orderby('taxes.from', 'desc')
            ->select(
                'taxes.percentage',
            )
            ->first();
        return $percentage;
    }
}
