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
        $Tax = Tax::whereDate('taxs.from', '<=', Carbon::now()->format('Y-m-d'))
            ->orderby('taxs.from', 'desc')
            ->first();
        return $Tax;
    }
}
