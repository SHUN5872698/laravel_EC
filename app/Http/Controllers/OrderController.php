<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tax;
use App\Models\Prefecture;
use App\Models\Order;
use App\Models\Order_item;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function order_confirmed(Request $request)
    {
        //ordersテーブルにレコードを新規作成
        $order_confirmed = new Order();
        $order_confirmed = $order_confirmed->order_confirmed($request);

        //order_itemsテーブルにレコードを新規作成
        $items_confirmed = new Order_item();
        $items_confirmed = $items_confirmed->items_confirmed($request);

        return redirect('login/cart_read');
    }
}
