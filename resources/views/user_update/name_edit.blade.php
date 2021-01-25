@extends('layouts.login_ec')
@section('title', 'ユーザー名変更ページ')
@section('menubar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">名前を変更</div>

                <div class="card-body">
                    <form method="POST" action="/name_up">
                        @csrf
                        <div class="form-group row mx-3">
                            <label for="name" class="col-md-4 col-form-label text-md-righ">
                                新しい名前
                            </label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ empty(old('name')) ? ($name) : old('name')}}" required autocomplete="name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <div class="col-md-５ offset-md-2">
                                <input type="submit" class="btn btn-outline-primary mx-2" value="変更を確定">
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
