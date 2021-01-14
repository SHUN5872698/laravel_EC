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
        <div class="card mx-3 my-3">
            <div class="card-header">購入履歴</div>
            @foreach ($orders as $order)
            <div class="card-body">
                <div class="row">
                    <div class="image">
                        <img src="../images/{{$order->image}}" width="150" height="150">
                    </div>
                    <div class="product">
                        {{$order->order_name}}
                        <br>単品価格：¥{{number_format($order->price * $order->tax)}}円(税込)
                        <br>購入数：{{$order->count}}個
                        <br>購入日：{{$order->order_date}}
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

@yield('footer')
@endsection
