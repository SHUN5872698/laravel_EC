@extends('layouts.login_ec')
@yield('css')
@section('title', '購入履歴閲覧ページ')

@section('menubar')

@section('content')
<h1>購入履歴閲覧ページ</h1>
<div class="row">
    <div class="col-md-3">
        <div class="card ml-3 my-3">
            <div class="card-header">コンテンツ</div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="/user_inf">ユーザー情報</a></li>
                    <li class="list-group-item"><a href="/login/cart_read">カート情報</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        @foreach ($orders as $order)
        <div class="card mx-3 my-3">
            <div class="card-header">
                <div class="row">
                    <p class="date mx-3">
                        <font size="2">注文日</font>
                        <br>{{$order['order']['order_date']->format('Y年m月d日')}}
                    </p>
                    <p class="total_price mx-3">
                        <font size="2">合計</font>
                        <br>{{number_format($order['order']['total_price'])}}円
                    </p>
                    <p class="buyer mx-3">
                        <font size="2">購入者名</font>
                        <br>{{$order['order']['name']}}
                    </p>
                    <p class="address">
                        <script>
                            (function () {
                                window.addEventListener("load", function () {
                                    $('[data-toggle="popover"]').popover();
                                    $(this).popover({
                                        html: true
                                    });


                                });
                            })();

                        </script>

                        <button type="button" class="btn btn-outline-primary mt-1" data-toggle="popover" data-content="{{$order['order']['postcode']}}<br>
                        {{$order['order']['prefectures_name']}}<br>{{$order['order']['city']}}
                        {{$order['order']['block']}}<br>{{$order['order']['building']}}" data-html="true" data-placement="bottom">お届け先情報
                        </button>
                    </p>
                </div>
            </div>
            <div class="card-body">
                @foreach ($order['item'] as $item)
                <div class="row mb-3">
                    <div class="image">
                        <img src="../images/{{$item['image']}}" width="150" height="150">
                    </div>
                    <div class="product mt-2">
                        <a href="/login/product?id={{$item['product_id']}}&category_master={{$item['category_master']}}">{{$item['order_name']}}</a>
                        <br>
                        価格:
                        <font color="red">¥{{number_format($item['price'] * $order['order']['tax'])}}円(税込)</font>
                        <br>
                        購入数：{{$item['count']}}個
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection

@yield('footer')
@endsection
