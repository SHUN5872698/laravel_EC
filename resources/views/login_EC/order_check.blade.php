@extends('layouts.login_ec')
@yield('css')
@section('title', '購入確認ページ')

@section('menubar')

@section('content')
<h1>購入確認ページ</h1>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-7">
        <div class="card ml-3 my-3">
            <div class="card-header">お届け先情報</div>
            <div class="row">
                <div class="card-body">
                    <table class="table table-borderless">
                        @foreach ($users as $user)
                        <tr>
                            <th>お届け先住所</th>
                        <tr>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>
                                {{ $user->postcode}}
                                <br>
                                {{$user->prefectures_name}}{{$user->city}}{{$user->block}}
                                <br>
                                {{$user->building}}
                            </td>
                        </tr>
                        <tr>
                            <td>連絡先：{{$user->phone}}</td>
                        </tr>
                        <tr>
                            <td>アドレス：{{$user->email }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card mr-3 mt-3">
            <div class="card-header">注文確認</div>
            <div class="card-product my-2">
                <p class="total ml-2">
                    <font size="6" color="red">
                        ¥{{number_format($total_price * $tax->percentage)}}</font>
                    <font size="2" color="red">(税込)</font>
                </p>
                <form action="order_confirmed" method="post">
                    @foreach ($order_check as $order)
                    <input type="hidden" name="user_id" value={{$order->user_id}}>
                    <input type="hidden" name="product_id" value={{$order->product_id}}>
                    @endforeach
                    <input type="submit" value="注文を確定" class="order_Confirm mb-3">
                </form>

            </div>
        </div>
    </div>

    <div class="col-md-2"></div>
    <div class="col-md-6">
        <div class="card ml-3 my-3">
            <div class="card-header">注文商品</div>
            <div class="row">
                <div class="card-body">
                    <table class="table table-border">
                        <tr>
                            <th>商品名</th>
                            <th>単品価格(税込)</th>
                            <th>購入数</th>
                            <th>合計金額</th>
                        </tr>
                        @foreach ($order_check as $order)
                        <tr>
                            <td>
                                <font size="2">{{$order->name}}</font>
                            </td>
                            <td>
                                <font size="3">
                                    ¥{{number_format($order->price * $tax->percentage)}}
                                </font>
                            </td>
                            <td>
                                <form action="countUp" method="post">
                                    @csrf
                                    <input type="number" class='count-number ml-1' name="count" min="1" max="100" value={{$order->count}}>
                                    <input type="hidden" name="product_id" value={{$order->product_id}}>
                                    <input type="submit" class="btn btn-secondary btn-sm ml-1" value="変更">
                                </form>
                            </td>
                            <td>
                                <font size="3" color="red">
                                    ¥{{number_format(($order->price * $order->count) * $tax->percentage)}}
                                </font>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


</div>


@yield('footer')
@endsection
