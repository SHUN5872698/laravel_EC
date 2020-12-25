<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Tax extends Model
{
    /**ガードするフィールド */
    protected $guarded = array('id');

    /**
     * 現在の税率を取得するメソッド
     */
    public function getTax()
    {
        $tax = Tax::whereDate('taxes.from', '<=', Carbon::now()->format('Y-m-d'))
            ->orderby('taxes.from', 'desc')
            ->first();
        $tax->percentage = ($tax->percentage + 100) / 100;
        return $tax;
    }
}
