@extends('layouts.ec')
@yield('css')
@section('title', 'メインページ')

@section('menubar')

@section('content')
<h1>メインページ</h1>
<div class="col-12">
    @foreach ($products as $product)
    @endforeach
    <div class="row my-3">
        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <a href="#">{{$product->name}}</a>
                    <br>
                    <a href="#">{{$product->category}}</a>
                    <br>
                    <p>¥{{$product->price}}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <img src="../images/{{$product->image}}" class="card-img-top my-3" alt="..." width="300" height="300">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                        the cards content.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@yield('footer')
@endsection
