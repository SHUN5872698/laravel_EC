@extends('layouts.app')
@section('title', '新規登録')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right mt-2">
                                <font class="mx-2">{{ __('Name') }}</font>
                                <font color="red">必須</font>
                            </label>

                            <div class="col-md-6 mt-2">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" maxlength="30" name="name" value="{{ old('name') }}" placeholder="2文字以上30文字以内" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">
                                <font class="mx-2">{{ __('Password') }}</font>
                                <font color="red">必須</font>
                            </label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" maxlength="30" placeholder="8文字以上３０文字以内" required autocomplete="password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">
                                <font class="mx-2">{{ __('Confirm Password') }}</font>
                                <font color="red">必須</font>
                            </label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" maxlength="30" required autocomplete="password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                <font class="mx-2">{{ __('E-Mail Address') }}</font>
                                <font color="red">必須</font>
                            </label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="contact@miraino-katachi.co.jp" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">
                                <font class="mx-2">{{ __('電話番号') }}</font>
                                <font color="red">必須</font>
                            </label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="000-0000-0000" required autocomplete="phone">

                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress01" class="col-md-4 col-form-label text-md-right">
                                <font class="mx-2">{{ __('郵便番号') }}</font>
                                <font color="red">必須</font>
                            </label>


                            <div class="col-md-3">
                                <input id="inputAddress01" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" maxlength="8" placeholder="550-0011" value="{{ old('postcode') }}" required autocomplete="new-phone">
                                @error('postcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mt-1">
                                <input type="button" onkeyup="AjaxZip3.zip2addr('postcode','','prefecture_id','city');" onclick="AjaxZip3.zip2addr('postcode','','prefecture_id','city');" value="検索">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress02" class="col-md-4 col-form-label text-md-right">
                                <font class="mx-2">{{ __('都道府県') }}</font>
                                <font color="red">必須</font>
                            </label>

                            <div class="col-md-6 mt-2">
                                <select name="prefecture_id" id="inputAddress02">
                                    <option value="">--- 選択してください ---</option>
                                    @foreach ($prefectures as $prefecture)
                                    <option value={{$prefecture->id}} @if(old('prefecture_id')==$prefecture->id ) selected @endif>
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
                                <font class="mx-2">{{ __('市町村区') }}</font>
                                <font color="red">必須</font>
                            </label>

                            <div class="col-md-6">
                                <input id="inputAddress03" type="text" name="city" class="form-control" value="{{ old('city') }}" required autocomplete="new-city">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress04" class="col-md-4 col-form-label text-md-right">
                                <font class="mx-2">{{ __('番地') }}</font>
                                <font color="red">必須</font>
                            </label>

                            <div class="col-md-6">
                                <input id="inputAddress04" type="text" name="block" class="form-control" value="{{ old('block') }}" required autocomplete="new-block">

                                @error('block')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress05" class="col-md-4 col-form-label text-md-right">
                                <font class="">{{ __('建物名・部屋番号') }}</font>
                                <font></font>
                            </label>

                            <div class="col-md-6">
                                <input id="inputAddress05" type="text" name="building" class="form-control" value="{{ old('building') }}">

                                @error('building')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <button type="button" class="btn btn-outline-primary" onclick="location.href='/main';">キャンセル</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</div>
@endsection
