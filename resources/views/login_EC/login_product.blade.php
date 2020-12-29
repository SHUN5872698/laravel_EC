@extends('layouts.login_ec')
@yield('css')
@section('title', 'ログイン済み商品ページ')

@section('menubar')

@section('content')
<h1>ログイン済み商品ページ</h1>
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
                    <br>商品概要<br>
                    {{$product->description}}
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
            </div>
        </div>
    </div>
    @endsection
    @yield('footer')
    @endsection
