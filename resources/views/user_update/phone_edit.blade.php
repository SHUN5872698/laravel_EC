@extends('layouts.login_ec')
@section('title', 'ユーザー名変更ページ')
@section('menubar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">電話番号を変更</div>

                <div class="card-body">
                    <form method="POST" action="/phone_up">
                        @csrf
                        <div class="form-group row mx-1">
                            <label for="name" class="col-md-5 col-form-label text-md-right">
                                新しい電話番号
                            </label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ empty(old('phone')) ? ($phone): old('phone')}}" placeholder="000-0000-0000" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <div class="col-md-５ offset-md-2">
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
