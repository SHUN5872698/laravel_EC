@extends('layouts.ec')
@yield('css')
@section('title', 'メインページ')

@section('menubar')

@section('content')
<h1>メインページ</h1>
<div class="row">
    @foreach ($products as $product)
    <div class="col-md-3 my-3">
        <div class="card">
            <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
            <div class="card-body">
                <p>
                    <font size="2"><a href="#">{{$product->name}}</a></font>
                    <br>
                    価格:
                    <font size="3" color="red">
                        ¥{{number_format($product->price * $Tax->percentage)}}</font>(税込)
                    <br>
                    <font size="3"><a href="#">カテゴリー: {{$product->category}}</a></font>
                </p>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@yield('footer')
@endsection
