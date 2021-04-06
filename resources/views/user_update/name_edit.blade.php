@extends('layouts.login_ec')
@section('title', 'ユーザー名変更ページ')
@section('menubar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 mt-3">
            <div class="card">
                <div class="card-header">名前を変更</div>

                <div class="card-body">
                    <form method="POST" action="/name_up">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label text-md-righ ml-3">
                                お名前
                            </label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" maxlength="30" name="name" value="{{ empty(old('name')) ? ($name) : old('name')}}" placeholder="2文字以上30文字以内" required autocomplete="name" autofocus>


                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <input type="submit" class="btn btn-outline-primary mx-2" value="変更を確定">
                            <button type="button" class="btn btn-outline-secondary" onclick="location.href='/user_inf';">キャンセル</button>
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
