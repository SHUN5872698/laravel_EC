@extends('layouts.login_ec')
@yield('css')
@section('title', '購入履歴ページ')

@section('menubar')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="ml-3">購入履歴</h1>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-3">
        <div class="card ml-3 ">
            <div class="card-header">コンテンツ</div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="/user_inf">ユーザー情報</a></li>
                    <li class="list-group-item"><a href="/login/cart_read">カート情報</a></li>
                </ul>
            </div>
        </div>
    </div>
    @if($orders->count() == 0 )
    <div class="col-md-9">
        <div class="card mx-3 mb-3">
            <div class="card-header">購入履歴</div>
            <div class="card-body">
                <h1>まだ購入された商品はありません。</h1>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-9">
        @foreach ($orders as $order)
        <div class="card mx-3 mb-3">
            <div class="card-header">
                <div class="row">
                    <p class="date mx-3">
                        <font size="2">注文日</font>
                        <br>{{$order['order']['order_date']->format('Y年m月d日')}}
                    </p>
                    <p class="total_price mx-3">
                        <font size="2">合計</font>
                        <br>
                        <font class="total">{{number_format($order['order']['total_price'])}}円</font>
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
                        <button type="button" class="btn btn-primary mt-2" data-toggle="popover" data-content="{{$order['order']['postcode']}}<br>
                        {{$order['order']['prefectures_name']}}<br>{{$order['order']['city']}}
                        {{$order['order']['block']}}<br>{{$order['order']['building']}}" data-html="true" data-placement="bottom">お届け先情報
                        </button>
                    </p>
                </div>
            </div>
            @foreach ($order['item'] as $item)
            <div class="order-item">
                <div class="card-body">
                    <div class="row">
                        <div class="image">
                            <img src="../images/{{$item['image']}}" width="150" height="150">
                            {{-- <img src="https://test-bucket5842.s3-ap-northeast-1.amazonaws.com/laravel_EC/{{$item['image']}}" width="150" height="150"> --}}
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
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
        <div class="links ml-3">
            {{$orders->links()}}
        </div>
    </div>

    @endif
</div>

@endsection

@yield('footer')
@endsection
