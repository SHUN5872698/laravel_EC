@extends('layouts.login_ec')
@yield('css')
@section('title', 'ログイン済みメインページ')

@section('menubar')

@section('content')
<h1>ログイン済みのメインページ</h1>
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-3 my-3">
        <div class="card mx-3">
            <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
            <div class="row">
                <div class="card-body ml-1">
                    <p class="product-card">
                        <font size="2"><a href="/login/product?id={{$product->id}}&category_master={{$product->category_master}}">{{$product->name}}</a></font>
                        <br>
                        価格:
                        <font color="red">
                            ¥{{number_format($product->price * $tax->percentage)}}円</font>
                        <font size="2" color="red">(税込)</font>
                        <br>
                        スペック:
                        <a href="/login/details/category?category={{$product->category}}&category_master={{$product->category_master}}"> {{$product->category}}</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection

@yield('footer')
@endsection
