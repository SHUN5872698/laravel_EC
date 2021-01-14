@extends('layouts.login_ec')
@yield('css')
@section('title', 'カートページ')

@section('menubar')

@section('content')
<h1>カートページ</h1>
<div class="row">
    <div class="col-md-9">
        <div class="card ml-3 mt-3">
            <div class="card-header">ショッピングカート</div>
            <div class="row">
                @foreach ($cart_items as $cart)
                <div class="col-md-3 my-2">
                    <div class="card">
                        <img src="../images/{{$cart->image}}" class="card-img-top my-3" alt="..." width="300" height="250">
                        <div class="card-body">
                            <div class="row">
                                <p class="cart-items">
                                    <font size="3"><a href="/login/product?id={{$cart->id}}&category_master={{$cart->category_master}}">{{$cart->name}}</a></font>
                                </p>
                                <p class="price">
                                    単品価格:
                                    <font size="3" color="red">
                                        ¥{{number_format($cart->price * $tax->percentage)}}</font>
                                    <font size="2" color="red">(税込)</font>
                                    <br>
                                </p>
                                <p>
                                    <form action="countUp" method="get">
                                        @csrf
                                        購入数
                                        <input type="number" class='count-number ml-1' name="count" min="1" max="100" value={{$cart->count}}>
                                        <input type="hidden" name="product_id" value={{$cart->product_id}}>
                                        <input type="submit" class="btn btn-secondary btn-sm ml-1" value="変更">
                                        <button type="button" class="btn btn-outline-danger btn-sm ml-1" onclick="location.href='/login/delete?product_id={{$cart->product_id}}';">削除</button>
                                    </form>
                                </p>
                                <p class="spec mt-3">
                                    スペック:
                                    <a href="/login/details/category?category={{$cart->category}}&category_master={{$cart->category_master}}"> {{$cart->category}}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            {{$cart_items->appends(request()->query())->links()}}
        </div>
    </div>

    @if ($total_price != 0)
    <div class="col-md-3">
        <div class="card mr-3 mt-3">
            <div class="card-header">小計</div>
            <div class="card-product my-2">
                <p class="total ml-2">
                    <font size="6" color="red">
                        ¥{{number_format($total_price)}}</font>
                    <font size="2" color="red">(税込)</font>
                </p>
                <a href="/login/order_check"><input type="submit" value="購入確認ページへ" class="order_check mb-3"></a>

            </div>
        </div>
    </div>
    @endif
</div>

@endsection

@yield('footer')
@endsection
