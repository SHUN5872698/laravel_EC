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
                @foreach ($cart_items as $product)
                <div class="col-md-3 ml-3 my-2">
                    <div class="card">
                        <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="250">
                        <div class="card-body">
                            <p>
                                <font size="2"><a href="/login/product?id={{$product->id}}&category_master={{$product->category_master}}">{{$product->name}}</a></font>
                                <br>
                                価格:
                                <font size="3" color="red">
                                    ¥{{number_format($product->price * $tax->percentage)}}</font>
                                <font size="2" color="red">(税込)</font>
                                <br>
                                スペック:
                                <a href="/login/details/category?category={{$product->category}}&category_master={{$product->category_master}}"> {{$product->category}}</a>
                            </p>
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
