@extends('layouts.ec')
@yield('css')
@section('title', 'メインページ')

@section('menubar')

@section('content')
<h1>メインページ</h1>
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-3 my-3">
        <div class="card mx-3">
            <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
            <div class="card-body">
                <p>
                    <font size="2"><a href="/product?id={{$product->id}}&category_master={{$product->category_master}}">{{$product->name}}</a></font>
                    <br>
                    価格:
                    <font color="red">
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
@endsection
@yield('footer')
@endsection
