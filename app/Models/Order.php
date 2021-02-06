<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

class Order extends Model
{
    /** タイムスタンプを無効化 */
    public $timestamps = false;

    /**ガードするフィールド */
    protected $guarded = array('id');

    /** date型にキャスト */
    protected $dates = ['order_date'];

    /** ホワイトリスト */
    // protected $fillable = ['user_id', 'prefecture_id', 'total_price', 'order_date', 'name', 'postcode', 'city', 'postcode', 'block', 'building', 'tax'];

    /** prefecturesテーブルとのリレーション */
    public function prefecture()
    {
        return $this->hasone('App\Models\Prefecture', 'id');
    }

    /** productimagesテーブルとのリレーション */
    public function productimage()
    {
        return $this->hasMany('App\Models\Productimage', 'product_id');
    }

    /** order_itemsテーブルとのリレーション */
    public function order_item()
    {
        return $this->hasmany('App\Models\Order_item', 'order_id');
    }

    /**
     * 新規レコードの作成処理
     * @param Request $request
     * @return void
     *
     * 今日の日付を取得
     * 購入者情報と現在の税率、カート内合計金額を抽出
     * 合計金額は税率混みの金額に変更処理を行い登録する
     */
    public function Order_add()
    {
        //ユーザー情報をログインしているユーザーから取得
        $auth = User::find(Auth::user()->id);

        //税率の取得
        $tax = new Tax();
        $tax = $tax->getTax();

        //カート内商品の合計金額を取得
        $total_price = new Cart_item();
        $total_price = $total_price->Total_price();

        //購入日の作成
        $now = Carbon::now()->format('Y-m-d');

        //登録処理の実行
        $order_confirmed = Order::create(
            [
                'user_id' => $auth->id,
                'prefecture_id' => $auth->prefecture_id,
                'total_price' => $total_price,
                'order_date' => $now,
                'name' => $auth->name,
                'postcode' => $auth->postcode,
                'city' => $auth->city,
                'block' => $auth->block,
                'building' => $auth->building,
                'tax' => $tax,
            ],
        );
        return ($order_confirmed);
    }

    /**
     * order_id情報を取得
     * @return void
     * order_itemsテーブルに登録するので最新の物を取得
     */
    public function Order_id()
    {
        $user = Order::where('user_id', Auth::user()->id)
            ->orderby('id', 'desc')
            ->pluck('id')
            ->first();
        return ($user);
    }

    /**
     *購入履歴情報の取得
     * @return void
     *
     * ログインしているユーザーidから購入者情報を購入日が新しい順に抽出
     * 抽出したidから購入した商品情報を取得して同一の連想配列内に格納
     */
    public function Order_History(Request $request)
    {
        //ordersテーブルの情報を取得
        $users = Order::with('prefecture')
            ->join('prefectures', 'prefectures.id', '=', 'orders.prefecture_id')
            ->where('orders.user_id', Auth::user()->id)
            ->orderby('orders.id', 'desc')
            ->select(
                'orders.id',
                'orders.total_price',
                'orders.name',
                'orders.order_date',
                'orders.postcode',
                'prefectures.name as prefectures_name',
                'orders.city',
                'orders.block',
                'orders.building',
                'orders.tax',
            )
            ->get();

        //繰り返す変数の初期化
        $i = 0;
        //格納する連想配列を作成
        $orders = array();

        //購入商品の情報を取得
        foreach ($users as $user) {
            $items = Order_item::with('Productimage')
                ->join('products', 'products.id', '=', 'order_items.product_id')
                ->join('productimages', 'productimages.product_id', '=', 'order_items.product_id')
                ->where('order_items.order_id', $user->id)
                ->where('productimages.kubun', 'main')
                ->select(
                    'products.category_master',
                    'productimages.image',
                    'order_items.product_id',
                    'order_items.name as order_name',
                    'order_items.price',
                    'order_items.count',
                )
                ->get();

            //購入者情報と購入商品を連想配列に格納する。
            $orders[$i]['order'] = $user;
            $orders[$i]['item'] = $items;
            $i++;
        }
        //$ordersを10件ずつに分割
        $orders = new LengthAwarePaginator(
            $orders,
            count($orders),
            10,
            1,
            array('path' => $request->url())
        );
        return $orders;
    }
}
