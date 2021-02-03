@extends('layouts.login_ec')
@yield('css')
@section('title', 'ログイン済み商品ページ')

@section('menubar')

@section('content')
<div class="row">
    <div class="col-md-3">
        <h1 class="ml-3">商品概要</h1>
    </div>
    <div class="col-md-9"></div>
    <div class="col-md-3"></div>
</div>
<div class="row my-3">
    <div class="col-md-3">
        <div class="card ml-3">
            <div class="card-header">商品情報</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    商品名:<br>
                    <font size="3">{{$products->name}}</font>
                    <br>
                    価格:
                    <font color="red">
                        ¥{{number_format($products->price * $tax)}}</font>
                    <font size="2" color="red">(税込)</font>
                    <br>
                    容量: {{$products->capacity}}
                </li>
                <li class="list-group-item">
                    <p>
                        商品概要
                        <br>
                        {{$products->description}}
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
    <div class="col-md-6">
        <div class="row">
            @foreach ($images as $image)
            <div class="col-md-6">
                <div class="card mb-2">
                    <img src="../images/{{$image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mr-2">
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
                        <input type="hidden" name="product_id" value={{$products->id}}>
                        <input type="submit" value="カートに追加する" class="cart_in my-3">
                </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
    @yield('footer')
    @endsection
