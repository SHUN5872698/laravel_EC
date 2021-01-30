@extends('layouts.login_ec')
@yield('css')
@section('title', 'カートページ')

@section('menubar')

@section('content')

<div class="row mt-3">
    <div class="col-md-9">
        <div class="card ml-4">
            <div class="card-header">ショッピングカート</div>
            @foreach ($items as $item)
            <div class="cart-item">
                <div class="card-body">
                    <div class="row">
                        <div class="image">
                            <img src="../images/{{$item->image}}" width="150" height="150">
                        </div>
                        <div class="product">
                            <div class="product_name my-2">
                                <a href="/login/product?id={{$item->id}}&category_master={{$item->category_master}}">{{$item->name}}</a>
                            </div>
                            <div class="price my-1">
                                単品価格:
                                <font size="3" color="red">
                                    ¥{{number_format($item->price * $tax->percentage)}}円</font>
                                <font size="2" color="red">(税込)</font>
                            </div>
                            <div class="count my-1">
                                <form action="countUp" method="get">
                                    @csrf
                                    購入数
                                    <input type="number" class='count-number ml-1' name="count" min="1" max="100" value={{$item->count}}>
                                    <input type="hidden" name="product_id" value={{$item->product_id}}>
                                    <input type="submit" class="btn btn-secondary btn-sm ml-1" value="変更">
                                    <button type="button" class="btn btn-outline-danger btn-sm ml-1" onclick="location.href='/login/delete?product_id={{$item->product_id}}';">削除</button>
                                </form>
                            </div>
                            <div class="spec">
                                スペック:
                                <a href="/login/details/category?category={{$item->category}}&category_master={{$item->category_master}}"> {{$item->category}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="paginate  mt-1 ml-4">
            {{$items->appends(request()->query())->links()}}
        </div>
    </div>

    <div class="col-md-3">
        <div class="card mr-3">
            <div class="card-header">小計</div>
            <div class="card-product my-2">
                <p class="total ml-2">
                    <font size="6" color="red">
                        ¥{{number_format($totalprice * $tax->percentage)}}</font>
                    <font size="2" color="red">(税込)</font>
                </p>
                @if ($totalprice != 0)
                <a href="/login/order_check"><input type="submit" value="購入確認ページへ" class="order_check mb-3"></a>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection

@yield('footer')
@endsection
