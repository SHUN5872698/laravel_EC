@extends('layouts.login_ec')
@yield('css')
@section('title', '購入確認ページ')

@section('menubar')

@section('content')
<h1>購入確認ページ</h1>
<div class="row mt-3">

    <div class="col-md-3">
        <div class="card ml-3 ">
            <div class="card-header">お届け先情報</div>
            <div class="row">
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td>お届け先住所</td>
                        <tr>
                            <td>{{$users->name}}</td>
                        </tr>
                        <tr>
                            <td>
                                <font size="2">
                                    {{ $users->postcode}}
                                    <br>
                                    {{$users->prefectures_name}}{{$users->city}}{{$users->block}}
                                    <br>
                                    {{$users->building}}
                                </font>
                            </td>
                        </tr>
                        <tr>
                            <td>連絡先：{{$users->phone}}</td>
                        </tr>
                        <tr>
                            <td>アドレス：{{$users->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">注文商品</div>
            @foreach ($items as $item)
            <div class="cart-item">
                <div class="card-body">
                    <div class="row">
                        <div class="image">
                            <img src="../images/{{$item->image}}" width="100" height="100">
                        </div>
                        <div class="product">
                            <div class="product_name">
                                <a href="/login/product?id={{$item->id}}&category_master={{$item->category_master}}">{{$item->name}}</a>
                            </div>
                            <div class="price">
                                単品価格:
                                <font size="3" color="red">
                                    ¥{{number_format($item->price * $tax->percentage)}}円</font>
                                <font size="2" color="red">(税込)</font>
                            </div>
                            <div class="count">
                                購入数：{{$item->count}}個
                            </div>
                            <div class="total">
                                合計:
                                <font size="3" color="red">
                                    ¥{{number_format(($item->price * $tax->percentage) * $item->count)}}円</font>
                                <font size="2" color="red">(税込)</font>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="paginate  mt-1 ">
            {{$items->appends(request()->query())->links()}}
        </div>
    </div>

    <div class="col-md-3">
        <div class="card mr-3">
            <div class="card-header">注文確認</div>
            <div class="card-product my-2">
                <p class="total ml-2">
                    <font size="6" color="red">
                        ¥{{number_format($total_price)}}</font>
                    <font size="2" color="red">(税込)</font>
                </p>
                <form action="order_confirmed" method="get">
                    @csrf
                    <input type="hidden" name="total_price" value={{$total_price}}>
                    <input type="hidden" name="user_id" value={{$users->id}}>
                    <input type="hidden" name="prefecture_id" value={{$users->prefecture_id}}>
                    <input type="submit" value="注文を確定" class="order_Confirm mb-3">
                </form>

            </div>
        </div>
    </div>
</div>


</div>


@yield('footer')
@endsection
