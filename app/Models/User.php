<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class User extends Model
{
    /**ガードするフィールド */
    protected $guarded = array('id');

    /**
     * prefecturesテーブルとのリレーション
     * @return void
     */
    public function prefecture()
    {
        return $this->hasOne('App\Models\Prefecture', 'id');
    }
}
