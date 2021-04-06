<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prefecture extends Model
{
    /**ガードするフィールド */
    protected $table = 'prefectures';
    protected $guarded = array('id');

    /**
     * 都道府県情報の取得
     * @return void
     */
    public function getData()
    {
        $data = DB::table($this->table)->get();
        return $data;
    }
}
