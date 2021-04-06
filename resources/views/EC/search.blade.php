@extends('layouts.ec')
@yield('css')
@section('title', 'カテゴリー検索結果ページ')
@section('menubar')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="ml-3">
            <font color="darkorange">"{{$one_master}}"</font>
            の商品一覧
        </h1>
    </div>
</div>
<div class="row my-3">
    <div class="col-md-3">
        <div class="card ml-3">
            <div class="card-header">スペックで絞り込む</div>
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
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <font class="one_master" color="darkorange">"{{$one_master}}"</font>
                で{{$count}}件ヒット
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-4 mb-1">
                        <div class="card-body">
                            <img src="https://test0123-bucket.s3.ap-northeast-3.amazonaws.com/images/{{$product->image}}" class="card-img-top " alt="..." width="250" height="270">
                            <div class="row my-2">
                                <p>
                                    <font size="2"><a href="/product?id={{$product->id}}&category_master={{$product->category_master}}">{{$product->name}}</a></font>
                                    <br>
                                    価格:
                                    <font size="3" color="red">
                                        ¥{{number_format($product->price * $tax)}}</font>
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
            </div>
        </div>
        <div class="links">
            {{$products->appends(request()->query())->links()}}
        </div>
    </div>
</div>

@endsection
@yield('footer')
@endsection
