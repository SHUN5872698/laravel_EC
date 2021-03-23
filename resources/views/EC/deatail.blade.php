@extends('layouts.ec')
@yield('css')
@section('title', '詳細検索ページ')

@section('menubar')

@section('content')
@if (isset($one_category))
<div class="row">
    <div class="col-md-12">
        <h1 class="ml-3">
            <font color="darkorange">"{{$one_category}}"</font>
            の商品一覧
        </h1>
    </div>
</div>
@elseif(isset($one_capacity))
<div class="row">
    <div class="col-md-12">
        <h1 class="ml-3">
            <font color="darkorange">"{{$one_capacity->category}}"</font>
            の商品一覧
        </h1>
    </div>
</div>
@endif
<div class="row my-3">
    <div class="col-md-3">
        <div class="card ml-3 mb-3">
            <div class="card-header">スペックで絞り込み</div>
            <ul class="list-group list-group-flush">
                <text class="ml-3 mt-2"></text>
                <li class="list-group-item">
                    @foreach ($categorys as $category)
                    <a href="/details/category?category={{$category->category}}&category_master={{$category->category_master}}">{{$category->category}}</a>
                    <br>
                    @endforeach
                </li>
            </ul>
        </div>
        <div class="card ml-3">
            <div class="card-header">容量で絞り込み</div>
            <ul class="list-group list-group-flush">
                <text class="ml-3 mt-2"></text>
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
        <div class="card">
            <div class="card-header">
                @if (isset($one_category))
                <font class="one_category" color="darkorange">"{{$one_category}}"</font>
                で{{$count}}件ヒット
                @elseif(isset($one_capacity))
                <font class="one_capacity" color="darkorange">"{{$one_capacity->category}}"</font>,
                <font class="one_capacity" color="deepskyblue">"{{$one_capacity->capacity}}"</font>,
                で{{$count}}件ヒット

                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-4 mb-1">
                        <div class="card-body">
                            {{--  <img src="../images/{{$product->image}}" class="card-img-top " alt="..." width="250" height="270"> --}}
                            <img src="https://test-bucket5842.s3-ap-northeast-1.amazonaws.com/laravel_EC/{{$product->image}}" class="card-img-top " alt="..." width="250" height="270">
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
