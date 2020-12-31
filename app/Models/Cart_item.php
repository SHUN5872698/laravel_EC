<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Cart_item extends Model
{
    /**ガードするフィールド */
    protected $guarded = array('id');

    /**
     * usersテーブルとのリレーション
     * @return void
     */
    public function user()
    {
        return $this->hasMany('App\User', 'id');
    }
    /**
     * productsテーブルとのリレーション
     * @return void
     */
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'id', 'name', 'description', 'price', 'category_master', 'category', 'capacity');
    }
    /**
     * productimagesテーブルとのリレーション
     * @return void
     */
    public function productimage()
    {
        return $this->hasMany('App\Models\Productimage', 'product_id', 'image', 'kubun');
    }
}
