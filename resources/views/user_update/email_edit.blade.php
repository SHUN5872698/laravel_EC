@extends('layouts.login_ec')
@section('title', 'ユーザー名変更ページ')
@section('menubar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">メールアドレスを変更</div>

                <div class="card-body">
                    <form method="POST" action="/email_up">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-right">
                                現在のアドレス
                            </label>
                            <div class="col-md-6 mt-2 text-left">
                                {{$email}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">
                                新しいアドレス

                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email')}}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-outline-primary mx-3" value="変更を確定">
                                <button type="button" class="btn btn-outline-secondary" onclick="location.href='/user_inf';">キャンセル</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@yield('footer')
@endsection
