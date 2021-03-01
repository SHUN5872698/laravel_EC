@extends('layouts.app')
@yield('css')
@section('title', 'ログイン')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">登録完了</div>
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-8 offset-md-2">
                            <h1 class="ml-5">登録が完了しました。</h1>
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-2">
                            <button type="submit" class="btn btn-primary ml-5" onclick="location.href='{{ route('login') }}';"> ログインページ</button> <button type="button" class="btn btn-outline-secondary" onclick="location.href='/';">メインページ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
