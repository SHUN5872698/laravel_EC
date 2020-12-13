@extends('layouts.login_ec')
@section('title', 'ユーザー情報確認ページ')
@section('menubar')

@section('content')
  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">ユーザー情報確認</div>
                    <div class="card-body">
                      <div class="form-group row-my-2">
                        <table class="table">
                          @foreach ($users as $user)
                          @endforeach
                          <tr>
                            <th>ユーザー名:</th>
                            <th>{{$user->name}}</th>
                          </tr>

                          <tr>
                            <th>メールアドレス</th>
                            <th>{{$user->email }}</th>
                          </tr>
                          <tr>
                            <th>パスワード</th>
                            <th>******</th>
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
                          </tr>

                          <tr>
                            <th></th>
                            <td></td>
                          </tr>
                        </table>
                                <div class="col-md-6 offset-md-4">
                                    <a class="btn btn-primary" href="{{ url('/user_edit') }}"role="button">ユーザー情報を変更</a>
                                    <a class="btn btn-outline-primary" href="{{ url('/login_main') }}"role="button">キャンセル</a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@yield('footer')
@endsection
