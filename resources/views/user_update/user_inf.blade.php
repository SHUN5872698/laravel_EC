@extends('layouts.login_ec')
@section('title', 'ユーザー情報確認ページ')
@section('menubar')

@section('content')

<div class="row">
    <div class="col-md-3">
        <div class="card ml-3 my-3">
            <div class="card-header">
                コンテンツ
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="/login/cart_read">カート情報</a></li>
                    <li class="list-group-item"><a href="/login/order_history">購入履歴</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>

    <div class="col-md-5">
        <div class="card my-3">
            <div class="card-header">ユーザー情報</div>
            <ul class="list-group list-group-flush text-left">
                <li class="list-group-item">
                    <div class="user-inf">
                        <a class="btn btn-outline-secondary btn-sm mt-2" href="/name_up" role="button">変更</a>
                    </div> お名前:<br>{{$name}}
                </li>
                <li class="list-group-item">
                    <div class="user-inf">
                        <a class="btn btn-outline-secondary btn-sm mt-2" href="/pass_up" role="button">変更</a>
                    </div>
                    パスワード:<br>*********
                </li>
                <li class="list-group-item">
                    <div class="user-inf">
                        <a class="btn btn-outline-secondary btn-sm mt-2" href="/email_up" role="button">変更</a>
                    </div>
                    メールアドレス:<br>{{$email}}
                </li>
                <li class="list-group-item">
                    <div class="user-inf">
                        <a class="btn btn-outline-secondary btn-sm mt-2" href="/phone_up" role="button">変更</a>
                    </div>
                    電話番号:<br>{{$phone}}
                </li>
                <li class="list-group-item">
                    <div class="user-inf">
                        <a class="btn btn-outline-secondary btn-sm mt-2" href="/address_up" role="button">変更</a>
                    </div>
                    登録住所:<br>{{ $postcode}}<br>{{$prefectures_name}}{{$city}}{{$block}}<br>{{$building}}
                </li>
            </ul>
        </div>
        <div class="form-group">
            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/user_inf';">キャンセル</button>
        </div>
    </div>
</div>


<div class="col-md-3"></div>
</div>
@endsection

@yield('footer')
@endsection
