@extends('layouts.login_ec')
@yield('css')
@section('title', 'ログイン済み商品ページ')

@section('menubar')

@section('content')
<h1>ログイン済み商品ページ</h1>
<div class="row">
    <div class="col-md-3">
        <div class="card ml-3 my-3">
            <div class="card-header">商品情報</div>
            <ul class="list-group list-group-flush">
                @foreach ($products as $product)
                @endforeach
                <li class="list-group-item">
                    商品名:
                    <br> {{$product->name}}
                    <br>
                    価格:<font color="red">
                        ¥{{number_format($product->price * $tax->percentage)}}</font>
                    <font size="2" color="red">(税込)</font>
                    <br>
                    容量: {{$product->capacity}}
                </li>
                <li class="list-group-item">
                    <p>
                        商品概要
                        <br>
                        {{$product->description}}
                    </p>
                </li>
                <li class="list-group-item">
                    商品を絞り込む
                    <br>
                    @foreach ($categorys as $category)
                    <a href="/login/details/category?category={{$category->category}}&category_master={{$category->category_master}}">{{$category->category}}</a>
                    <br>
                    @endforeach</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6 my-3">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 mb-3">
                <div class="card">
                    <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mr-3 my-3">
            <div class="card-header">
                <div class="card-product">
                    <form action="/login/cart_in" method="post">
                        @csrf
                        <div class="count">
                            数量：
                            <select name="count">
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <input type="hidden" name="user_id" value={{Auth::user()->id}}>
                        @foreach ($products as $product)
                        @endforeach
                        <input type="hidden" name="product_id" value={{$product->id}}>
                        <input type="submit" value="カートに追加する" class="cart_in my-3">
                </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @yield('footer')
    @endsection
