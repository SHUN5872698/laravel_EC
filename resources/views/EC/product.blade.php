@extends('layouts.ec')
@yield('css')
@section('title', '商品ページ')

@section('menubar')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="ml-3">商品概要</h1>
    </div>
</div>
<div class="row my-3">
    <div class="col-md-3">
        <div class="card ml-3 mb-3">
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
            </ul>
        </div>
        <div class="card ml-3">
            <div class="card-header">関連商品</div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    @foreach ($categorys as $category)
                    <a href="/details/category?category={{$category->category}}&category_master={{$category->category_master}}">{{$category->category}}</a>
                    <br>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-6">
        <div class="row">
            @foreach ($images as $image)
            <div class="col-md-6">
                <div class="card mb-2">
                    <img src="https://test0123-bucket.s3.ap-northeast-3.amazonaws.com/images/{{$image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-md-3">
        <div class="card mr-3">
            <div class="card-header">
                <font size="2" color="red">
                    ※商品を購入するにはログインが必要です。
                </font>
            </div>
            <div class="card-body">
                <div class="card-product">
                    <a href="{{ route('login') }}">
                        <input type="submit" value="ログイン" class="login">
                    </a>
                    <br>
                    <a href="/register">
                        <input type="submit" value="新規登録" class="register my-3">
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @yield('footer')
    @endsection
