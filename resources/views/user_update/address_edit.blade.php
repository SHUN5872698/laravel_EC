@extends('layouts.login_ec')
@section('title', 'ユーザー名変更ページ')
@section('menubar')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">住所変更</div>
                <div class="card-body">
                    <form method="POST" action="/address_up">
                        @csrf
                        <div class="form-group row">
                            <label for="inputAddress01" class="col-md-3 col-form-label text-md-right">
                                {{ __('郵便番号') }}
                            </label>

                            <div class="col-md-3">
                                <input id="inputAddress01" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" maxlength="8" value="{{ empty(old('postcode')) ? ($user->postcode) : old('postcode')}}" required autocomplete="postcode">
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
                            <label for="inputAddress02" class="col-md-3 col-form-label text-md-right">
                                {{ __('都道府県') }}
                            </label>

                            <div class="mt-2 mx-3">
                                <select name="prefecture_id" id="inputAddress02">
                                    <option value={{$user->prefecture_id}}>{{($user->prefectures_name)}}</option>
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
                            <label for="inputAddress03" class="col-md-3  col-form-label text-md-right">
                                {{ __('市町村区') }}
                            </label>
                            <div class="col-md-8">
                                <input id="inputAddress03" type="text" name="city" class="form-control" value="{{ empty(old('city')) ? ($user->city) : old('city')}}" required autocomplete="city">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress04" class="col-md-3 col-form-label text-md-right">
                                {{ __('番地') }}
                            </label>
                            <div class="col-md-8">
                                <input id="inputAddress04" type="text" name="block" class="form-control" value="{{ empty(old('block')) ? ($user->block) : old('block')}}" required autocomplete="block">
                                @error('block')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputAddress05" class="col-md-3 col-form-label text-md-right">
                                {{ __('建物名・部屋番号') }}
                            </label>

                            <div class="col-md-8">
                                <input id="inputAddress05" type="text" name="building" class="form-control" value="{{ empty(old('building')) ? ($user->building) : old('building')}}">
                                @error('building')
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
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
</div>
@endsection


@yield('footer')
@endsection
