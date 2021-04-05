@extends('layouts.login_ec')

@section('css')
<link rel="stylesheet" href="{{ asset('js/jquery-ui-1.12.1/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/jquery-ui-1.12.1/jquery-ui.structure.min.css') }}">
<link rel="stylesheet" href="{{ asset('js/jquery-ui-1.12.1/jquery-ui.theme.min.css') }}">
@endsection
@section('title', 'カートページ')

@section('menubar')


@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="ml-4">ショッピングカート</h1>
    </div>
</div>
<div class="row mt-3">
    @if($items->count() == 0 )
    <div class="col-md-9">
        <div class="card ml-3">
            <div class="card-header">カート内アイテム</div>
            <div class="card-body">
                <h1>お客様のカートに商品はありません。</h1>
            </div>
        </div>
    </div>
    @else
    <div class="col-md-9">
        <div class="card ml-4">
            <div class="card-header">
                <font class="title">カートに商品が</font>
                <font class="cart_count">{{$count}}</font>
                <font class="ms">件入っています。</font>

            </div>
            @foreach ($items as $item)
            <div class="cart-item">
                <div class="card-body">
                    <div class="row">
                        <div class="image">
                            <img src="../images/{{$item->image}}" width="150" height="150">
                            <img src="https://test0123-bucket.s3.ap-northeast-3.amazonaws.com/images/{{$item->image}}" width="150" height="150">
                        </div>
                        <div class="product">
                            <div class="product_name my-2">
                                <a href="/login/product?id={{$item->id}}&category_master={{$item->category_master}}">{{$item->name}}</a>
                            </div>
                            <div class="price my-1">
                                単品価格:
                                <font size="3" color="red">
                                    ¥{{number_format($item->price * $tax)}}円</font>
                                <font size="2" color="red">(税込)</font>
                            </div>
                            <div class="count my-1">
                                <div class="row">
                                    <form action="countUp" method="get">
                                        @csrf
                                        購入数
                                        <input type="number" class='count-number ml-1' name="count" min="1" max="100" value={{$item->count}}>
                                        <input type="hidden" name="product_id" value={{$item->product_id}}>
                                        <input type="submit" class="btn btn-secondary btn-sm ml-1" value="変更">
                                    </form>
                                    <input type="button" class="btn btn-outline-danger btn-sm ml-1" onclick="deleteProduct({{ $item->product_id }}, '{{ $item->name }}');" value="削除">
                                </div>

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
            {{$items->links()}}
        </div>
    </div>
    @endif

    <div class="col-md-3">
        <div class="card mr-3">
            <div class="card-header">小計</div>
            <div class="card-product my-2">
                <p class="total">
                    <font class="total ml-4" size="6" color="red">
                        ¥{{number_format($total_price)}}円</font>
                    <font size="2" color="red">(税込)</font>
                </p>
                @if ($total_price != 0)
                <a href="/login/order_check"><input type="submit" value="購入確認ページへ" class="order_check mb-3"></a>
                @endif
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-ui-1.12.1/external/jquery/jquery.js') }}"></script>
<script src="{{ asset('js/jquery-ui-1.12.1/jquery-ui.min.js') }}"></script>

<script>
    $(function () {
        $("#dialog-confirm").hide();
    });

    function deleteProduct(product_id, name) {
        $("#product-delete").text(name);
        $("#dialog-confirm").dialog({
            resizable: false,
            height: "auto",
            width: 400,
            modal: true,
            buttons: {
                "削除": function () {
                    $(this).dialog("close");
                    location.href = '/login/delete?product_id=' + product_id;
                },

                "キャンセル": function () {
                    $(this).dialog("close");
                }
            }
        });
    }

</script>
<div id="dialog-confirm" title="削除">
    <p><span class=" ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
        下記の商品をカートから削除してもいいですか？<br>
        <p id="product-delete"></p>
    </p>
</div>
@endsection

@yield('footer')
@endsection
