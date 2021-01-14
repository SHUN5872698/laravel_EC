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

    // /**
    //  * usersテーブルとのリレーション
    //  * @return void
    //  */
    // public function user()
    // {
    //     return $this->hasone('App\User', 'id');
    // }
    /**
     * prefectureテーブルとのリレーション
     * @return void
     */
    public function prefecture()
    {
        return $this->hasone('App\Models\Prefecture', 'id');
    }

    /**
     * productimagesテーブルとのリレーション
     * @return void
     */
    public function productimage()
    {
        return $this->hasMany('App\Models\Productimage', 'product_id');
    }

    /**
     * order_itemsテーブルとのリレーション
     * @return void
     */
    public function order_item()
    {
        return $this->hasmany('App\Models\Order_item', 'order_id');
    }

    /**
     *新規レコードの作成処理
     * @param Request $request
     * @return void
     */
    public function order_confirmed(Request $request)
    {
        //登録するユーザー情報の取得
        $users = new User();
        $users = $users->order_confirmed($request);

        //登録する税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //購入日の作成
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

    /**
     *order_itemsテーブルに登録するorder_id情報を取得
     * @param Request $request
     * @return void
     */
    public function getOrder_User(Request $request)
    {
        $getrder_User = Order::where('user_id', $request->user_id)
            ->select(
                'orders.id',
            )
            ->orderby('id', 'desc')
            ->first();
        return ($getrder_User);
    }

    /**
     *購入履歴情報の取得
     * @param Request $request
     * @return void
     */
    public function Order_History()
    {
        $order_History = Order::with('Order_item', 'Productimage', 'prefecture')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->join('prefectures', 'prefectures.id', '=', 'orders.prefecture_id')
            ->join('productimages', 'productimages.product_id', '=', 'order_items.product_id')
            ->where('orders.user_id', Auth::user()->id)
            ->where('productimages.kubun', 'main')
            ->orderby('orders.id', 'desc')
            ->select(
                'orders.id',
                'orders.total_price',
                'orders.name',
                'orders.order_date',
                'orders.postcode',
                'orders.city',
                'orders.block',
                'orders.building',
                'orders.tax',
                'prefectures.name as prefectures_name',
                'productimages.image',
                'order_items.product_id',
                'order_items.name as order_name',
                'order_items.price',
                'order_items.count',
            )
            ->paginate(12);

        return ($order_History);
    }
}
