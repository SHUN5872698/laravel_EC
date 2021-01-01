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
                            <div class="row ml-2">
                                <p class="product-name">
                                    <font size="3"><a href="/login/product?id={{$cart->id}}&category_master={{$cart->category_master}}">{{$cart->name}}</a></font>
                                </p>
                                <p class="product-price">
                                    単品価格:
                                    <font size="2" color="red">
                                        ¥{{number_format($cart->price * $tax->percentage)}}</font>
                                    <font size="2" color="red">(税込)</font>
                                </p>
                                <p class="cart-count">購入数</p>
                                <form action="/login/cart_count_up" method="GET">
                                    <input type="number" class='count-number ml-1' name="count" min="0" max="100" value={{$cart->count}}>
                                    <button type="button" class="btn btn-secondary btn-sm ml-2">変更</button>
                                </form>
                                <p class="product-spec">
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

    <div class="col-md-3">
        <div class="card mr-3 mt-3">
            <div class="card-header">小計</div>
            <div class="card-body"></div>
        </div>
    </div>
</div>

@endsection

@yield('footer')
@endsection
