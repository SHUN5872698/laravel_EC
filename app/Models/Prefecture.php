<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prefecture extends Model
{
    /**ガードするフィールド */
    protected $guarded = array('prefecture_id');
    /**
     * prefecturesテーブルとusersテーブルをリレーション
     * @return void
     */
}
