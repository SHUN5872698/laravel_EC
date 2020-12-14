@extends('layouts.login_ec')
@section('title', 'ユーザー情報変更ページ')

@section('menubar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">ユーザ情報更新</div>

                <div class="card-body">
                    <form action="/user_up" method="post">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">
                                {{ __('Name') }}　　<font color="red">必須</font></label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ empty(old('name')) ? (Auth::user()->name) : old('name')}}" required autocomplete="name">

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                {{ __('E-Mail Address') }}　<font color="red">必須</font></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ empty(old('email')) ? (Auth::user()->email) : old('email')}}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                {{ __('電話番号') }}　　<font color="red">必須</font></label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ empty(old('phone')) ? (Auth::user()->phone) : old('phone')}}" placeholder="000-0000-0000" required autocomplete="new-phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress01" class="col-md-4 col-form-label text-md-right">
                                {{ __('郵便番号') }}　　<font color="red">必須</font></label>

                            <div class="col-md-6">
                                <input id="inputAddress01" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','prefecture_id','city');" placeholder="550-0011" value="{{ empty(old('postcode')) ? (Auth::user()->postcode) : old('postcode')}}" required autocomplete="new-phone">

                                @error('postcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress02" class="col-md-4 col-form-label text-md-right">
                                {{ __('都道府県') }}　　<font color="red">必須</font></label>

                            <div class="col-md-6">
                                <select name="prefecture_id" id="inputAddress02">
                                    <option value="">--- 選択してください ---</option>
                                    @foreach ($prefectures as $prefecture)
                                    <option value={{$prefecture->id}} @if(old('prefecture_id')=='01' ) selected @endif>
                                        {{$prefecture->name}}</option>
                                    @endforeach
                                </select>

                                @error('prefecture_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress03" class="col-md-4 col-form-label text-md-right">
                                {{ __('市町村区') }}　　<font color="red">必須</font></label>

                            <div class="col-md-6">
                                <input id="inputAddress03" type="text" name="city" class="form-control" placeholder="大阪市西区阿波座" value="{{ empty(old('city')) ? (Auth::user()->city) : old('city')}}" required autocomplete="new-city">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress04" class="col-md-4 col-form-label text-md-right">
                                {{ __('番地') }}　　<font color="red">必須</font></label>

                            <div class="col-md-6">
                                <input id="inputAddress04" type="text" name="block" class="form-control" placeholder="１丁目１３−１６" value="{{ empty(old('block')) ? (Auth::user()->block) : old('block')}}" required autocomplete="new-block">

                                @error('block')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress05" class="col-md-4 col-form-label text-md-right">
                                {{ __('建物名・部屋番号') }}　　</label>

                            <div class="col-md-6">
                                <input id="inputAddress05" type="text" name="building" class="form-control" placeholder="松本フォレストビル501" value="{{ empty(old('building')) ? (Auth::user()->building) : old('building')}}">

                                @error('building')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="変更を確定">
                                <button type="button" class="btn btn-outline-primary" onclick="location.href='/login_main';">キャンセル</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</div>

@yield('footer')
@endsection
