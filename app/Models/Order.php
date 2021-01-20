<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    //タイムスタンプを無効化
    public $timestamps = false;

    /**ガードするフィールド */
    protected $guarded = array('id');

    protected $dates = ['order_date'];

    // protected $casts = ['total_price' => 'int'];

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
    // public function Order_History()
    // {
    //     $History = Order::with('Order_item', 'Productimage', 'prefecture')
    //         ->join('order_items', 'order_items.order_id', '=', 'orders.id')
    //         ->join('prefectures', 'prefectures.id', '=', 'orders.prefecture_id')
    //         ->join('productimages', 'productimages.product_id', '=', 'order_items.product_id')
    //         ->select(
    //             'orders.id',
    //             'orders.name',
    //             'orders.order_date',
    //             'orders.postcode',
    //             'orders.city',
    //             'orders.block',
    //             'orders.building',
    //             'orders.tax',
    //             'prefectures.name as prefectures_name',
    //             'productimages.image',
    //             'order_items.product_id',
    //             'order_items.name as order_name',
    //             'order_items.price',
    //             'order_items.count',
    //         )
    //         ->whereYear('order_date', 2021)
    //         ->whereMonth('order_date', 1)
    //         ->where('orders.user_id', Auth::user()->id)
    //         ->where('productimages.kubun', 'main')
    //         ->orderby('orders.id', 'desc')
    //         ->paginate(12)
    //         ->groupBy(function ($histroy) {
    //             return $histroy->order_date->format('d');
    //         });

    // ->groupBy(
    //     function ($val) {
    //         return Carbon::parse($val->order_date)->format("Y-m-d");
    //     }
    // );
    //     return $History;
    // }

    public function Order_History()
    {
        $users = Order::with('prefecture')
            ->join('prefectures', 'prefectures.id', '=', 'orders.prefecture_id')
            ->where('orders.user_id', Auth::user()->id)
            ->orderby('order_date', 'desc')
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
            ->paginate(12);
        $i = 0;
        $orders = array();
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
                ->paginate(12);
            $orders[$i]['order'] = $user;
            $orders[$i]['item'] = $items;
            $i++;
        }
        return $orders;
    }


    // public function Total_Price()
    // {
    //     $total_price = DB::table('orders')
    //         ->whereYear('order_date', 2021)
    //         ->whereMonth('order_date', 1)
    //         ->where('orders.user_id', Auth::user()->id)
    //         ->select('order_date')
    //         ->selectRaw('SUM(total_price) as total_price',)
    //         ->orderby('order_date', 'desc')
    //         ->groupBy('order_date')
    //         ->get();
    //     return ($total_price);
    // }

    // public function Total_Price()
    // {
    //     $total_price = Order::whereYear('order_date', 2021)
    //         ->whereMonth('order_date', 1)
    //         ->where('user_id', Auth::user()->id)
    //         ->distinct()
    //         ->select('total_price', 'order_date')
    //         ->get()
    //         ->groupBy(
    //             function ($val) {
    //                 return Carbon::parse($val->order_date)->format("Y-m-d");
    //             }
    //         )
    //         ->map(function ($day) {
    //             return $day->sum('total_price');
    //         });
    //     return ($total_price);
    // }
}
