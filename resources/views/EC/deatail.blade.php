@extends('layouts.ec')
@yield('css')
@section('title', 'メインページ')

@section('menubar')

@section('content')
<h1>詳細検索</h1>
<div class="row">
    <div class="col-md-3">
        <div class="card ml-3 mt-3">
            <div class="card-header">詳細検索</div>
            <ul class="list-group list-group-flush">
                <text class="ml-3 mt-2">スペックで選択</text>
                <li class="list-group-item">
                    @foreach ($categorys as $category)
                    <a href="/details/category?category={{$category->category}}&category_master={{$category->category_master}}">{{$category->category}}</a>
                    <br>
                    @endforeach</li>
                <text class="ml-3 mt-2">容量で選択</text>
                <li class="list-group-item">
                    @foreach ($capacitys as $capacity)
                    <a href="/details/capacity?category_master={{$capacity->category_master}}&category={{$capacity->category}}
                        &capacity={{$capacity->capacity}}">
                        {{$capacity->capacity}}</a>
                    <br>
                    @endforeach
                </li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4 my-3">
                <div class="card">
                    <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                    <div class="card-body">
                        <p>
                            <font size="2"><a href="/product?id={{$product->id}}&category_master={{$product->category_master}}">{{$product->name}}</a></font>
                            <br>
                            価格:
                            <font size="3" color="red">
                                ¥{{number_format($product->price * $tax->percentage)}}</font>
                            <font size="2" color="red">(税込)</font>
                            <br>
                            スペック:
                            <a href="/details/category?category={{$product->category}}&category_master={{$product->category_master}}"> {{$product->category}}</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{$products->appends(request()->query())->links()}}
    </div>
</div>

@endsection
@yield('footer')
@endsection
