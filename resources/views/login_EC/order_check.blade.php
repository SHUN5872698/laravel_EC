@extends('layouts.login_ec')
@yield('css')
@section('title', '購入確認ページ')

@section('menubar')

@section('content')
<h1>購入確認ページ</h1>
<div class="row">
    <div class="col-md-3">
        <div class="card ml-3 my-3">
            <div class="card-header">お届け先情報</div>
            <div class="row">
                <div class="card-body">
                    <table class="table table-border">
                        @foreach ($users as $user)
                        @endforeach
                        <tr>
                            <th>お名前：{{$user->name}}</th>
                        <tr>
                            <th>アドレス：{{$user->email }}</th>
                        </tr>
                        <tr>
                            <th>連絡先：{{$user->phone}}</th>
                        </tr>
                        <tr>
                            <th>お届け先<br>
                                {{ $user->postcode}}<br>

                                {{$user->prefectures_name}}
                                <br>{{$user->city}}{{$user->block}}
                                <br>
                                {{$user->building}}
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 my-3">
        <div class="card">
            <div class="card-header">注文商品</div>
            <div class="card-body"></div>
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
                <input type="submit" value="注文を確定" class="order_Confirm mb-3">
            </div>
        </div>
    </div>
</div>


</div>


@yield('footer')
@endsection
