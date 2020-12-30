@extends('layouts.ec')
@yield('css')
@section('title', '商品ページ')

@section('menubar')

@section('content')
<h1>商品ページ</h1>
<div class="row">
    <div class="col-md-3">
        <div class="card ml-3 mt-3">
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

                    <p>商品概要
                        <br>{{$product->description}}</p>
                </li>
                <li class="list-group-item">
                    商品を絞り込む
                    <br>
                    @foreach ($categorys as $category)
                    <a href="/details/category?category={{$category->category}}&category_master={{$category->category_master}}">{{$category->category}}</a>
                    <br>
                    @endforeach</li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-6 my-3">
                <div class="card">
                    <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mr-3 mt-3">
            <div class="card-header">
                <font color="red">
                    ※商品を購入するにはログインが必要です。
                </font>
                <br>
                <div class="btnarea">
                    <a href="{{ route('login') }}">
                        <input type="submit" value="ログイン" class="login mt-3">
                    </a>
                    <br>
                    <a href="{{ route('register') }}">
                        <input type="submit" value="新規登録" class="register mt-3">
                    </a>
                </div>
                <ul class="list-group list-group-flush">
                </ul>
            </div>
        </div>
    </div>
    @endsection
    @yield('footer')
    @endsection
