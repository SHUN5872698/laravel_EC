@extends('layouts.login_ec')
@section('title', 'ユーザー情報確認ページ')
@section('menubar')

@section('content')
<div class="row">
    <div class="col-3 ml-3">
        <div class="card">
            <div class="card-header">
                コンテンツ
            </div>
            <div class="card-body">
                <a href="/login/cart_read">
                    カート情報
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">ユーザー情報確認</div>
            <div class="card-body">
                <div class="form-group row justify-content-center">
                    <div class="col-12">
                        <table class="table table-border">
                            @foreach ($users as $user)
                            <tr>
                                <th>ユーザー名:</th>
                                <th>{{$user->name}}</th>
                            </tr>
                            <tr>
                                <th>メールアドレス</th>
                                <th>{{$user->email }}</th>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <th>{{$user->phone}}</th>
                            </tr>
                            <tr>
                                <th>郵便番号</th>
                                <th>{{ $user->postcode}}</th>
                            </tr>
                            <tr>
                                <th>登録住所</th>
                                <th>{{$user->prefectures_name}} {{$user->city}} {{$user->block}} {{$user->building}}</th>
                            <tr>
                                <th></th>
                                <td></td>
                            </tr>
                            @endforeach
                        </table>
                    </div>

                    <a class="btn btn-primary mx-3" href="{{ url('/user_edit') }}" role="button">ユーザー情報を変更</a>
                    <a class="btn btn-outline-primary mx-3" href="{{ url('/login_main') }}" role="button">キャンセル</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-3"></div>
</div>
@endsection

@yield('footer')
@endsection
