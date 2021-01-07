<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    //タイムスタンプを無効化
    public $timestamps = false;

    /**ガードするフィールド */
    protected $guarded = array('id');

    /**ホワイトリスト */
    protected $fillable = ['user_id', 'prefecture_id', 'total_price', 'order_date', 'name', 'postcode', 'city', 'postcode', 'block', 'building', 'tax'];


    /**
     * usersテーブルとのリレーション
     * @return void
     */
    public function user()
    {
        return $this->hasone('App\User', 'id');
    }
    /**
     * prefectureテーブルとのリレーション
     * @return void
     */
    public function prefecture()
    {
        return $this->hasone('App\Models\Prefecture', 'name');
    }
    /**
     * order_itemsテーブルとのリレーション
     * @return void
     */
    public function order_items()
    {
        return $this->hasmany('App\Models\order_items', 'product_id', 'order_id', 'name', 'price', 'count');
    }

    //購入データの作成
    public function order_confirmed(Request $request)
    {
        $users = new User();
        $users = $users->order_confirmed($request);

        $tax = new Tax();
        $tax = $tax->percentage();

        $now = Carbon::now()->format('Y-m-d');

        $order_confirmed = Order::create(
            [
                'user_id' => $users->id,
                'prefecture_id' => $users->prefecture_id,
                'total_price' => $request->total_price,
                'order_date' => $now,
                'name' => $users->name,
                'postcode' => $users->postcode,
                'city' => $users->city,
                'block' => $users->block,
                'building' => $users->building,
                'tax' => $tax->percentage,
            ],
        );
        return ($order_confirmed);
    }

    public function getorder_User(Request $request)
    {
        $getorder_User = Order::where('id', $request->user_id)
            ->select(
                'orders.id',
            )
            ->first();
        return ($getorder_User);
    }
}
