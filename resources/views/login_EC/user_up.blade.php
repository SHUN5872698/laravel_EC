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
                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ empty(old('name')) ? (Auth::user()->name) : old('name')}}"
                                        required autocomplete="name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ __('E-Mail Address') }}　<font color="red">必須</font></label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ empty(old('email')) ? (Auth::user()->email) : old('email')}}"
                                        required autocomplete="email">

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
                                    <input id="phone" type="phone"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ empty(old('phone')) ? (Auth::user()->phone) : old('phone')}}"
                                        placeholder="000-0000-0000"
                                        required autocomplete="new-phone">

                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputAddress01"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ __('郵便番号') }}　　<font color="red">必須</font></label>

                                <div class="col-md-6">
                                    <input id="inputAddress01" type="text"
                                    class="form-control @error('postcode') is-invalid @enderror"
                                     name="postcode" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','prefecture_id','city');" placeholder="550-0011"
                                     value="{{ empty(old('postcode')) ? (Auth::user()->postcode) : old('postcode')}}"
                                    required autocomplete="new-phone">

                                    @error('postcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputAddress02"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ __('都道府県') }}　　<font color="red">必須</font></label>

                                <div class="col-md-6">
                                    <select name="prefecture_id" id="inputAddress02">
                                        <option value="">-- 選択してください --</option>
                                        <option value="01" @if(old('prefecture_id')=='01') selected  @endif>北海道</option>
                                        <option value="02" @if(old('prefecture_id')=='02') selected  @endif>青森県</option>
                                        <option value="03" @if(old('prefecture_id')=='03') selected  @endif>岩手県</option>
                                        <option value="04" @if(old('prefecture_id')=='04') selected  @endif>宮城県</option>
                                        <option value="05" @if(old('prefecture_id')=='05') selected  @endif>秋田県</option>
                                        <option value="06" @if(old('prefecture_id')=='06') selected  @endif>山形県</option>
                                        <option value="07" @if(old('prefecture_id')=='07') selected  @endif>福島県</option>
                                        <option value="08" @if(old('prefecture_id')=='08') selected  @endif>茨城県</option>
                                        <option value="09" @if(old('prefecture_id')=='09') selected  @endif>栃木県</option>
                                        <option value="10" @if(old('prefecture_id')=='10') selected  @endif>群馬県</option>
                                        <option value="11" @if(old('prefecture_id')=='11') selected  @endif>埼玉県</option>
                                        <option value="12" @if(old('prefecture_id')=='12') selected  @endif>千葉県</option>
                                        <option value="13" @if(old('prefecture_id')=='13') selected  @endif>東京都</option>
                                        <option value="14" @if(old('prefecture_id')=='14') selected  @endif>神奈川県</option>
                                        <option value="15" @if(old('prefecture_id')=='15') selected  @endif>新潟県</option>
                                        <option value="16" @if(old('prefecture_id')=='16') selected  @endif>富山県</option>
                                        <option value="17" @if(old('prefecture_id')=='17') selected  @endif>石川県</option>
                                        <option value="18" @if(old('prefecture_id')=='18') selected  @endif>福井県</option>
                                        <option value="19" @if(old('prefecture_id')=='19') selected  @endif>山梨県</option>
                                        <option value="20" @if(old('prefecture_id')=='20') selected  @endif>長野県</option>
                                        <option value="21" @if(old('prefecture_id')=='21') selected  @endif>岐阜県</option>
                                        <option value="22" @if(old('prefecture_id')=='22') selected  @endif>静岡県</option>
                                        <option value="23" @if(old('prefecture_id')=='23') selected  @endif>愛知県</option>
                                        <option value="24" @if(old('prefecture_id')=='24') selected  @endif>三重県</option>
                                        <option value="25" @if(old('prefecture_id')=='25') selected  @endif>滋賀県</option>
                                        <option value="26" @if(old('prefecture_id')=='26') selected  @endif>京都府</option>
                                        <option value="27" @if(old('prefecture_id')=='27') selected  @endif>大阪府</option>
                                        <option value="28" @if(old('prefecture_id')=='28') selected  @endif>兵庫県</option>
                                        <option value="29" @if(old('prefecture_id')=='29') selected  @endif>奈良県</option>
                                        <option value="30" @if(old('prefecture_id')=='30') selected  @endif>和歌山県</option>
                                        <option value="31" @if(old('prefecture_id')=='31') selected  @endif>鳥取県</option>
                                        <option value="32" @if(old('prefecture_id')=='32') selected  @endif>島根県</option>
                                        <option value="33" @if(old('prefecture_id')=='33') selected  @endif>岡山県</option>
                                        <option value="34" @if(old('prefecture_id')=='34') selected  @endif>広島県</option>
                                        <option value="35" @if(old('prefecture_id')=='35') selected  @endif>山口県</option>
                                        <option value="36" @if(old('prefecture_id')=='36') selected  @endif>徳島県</option>
                                        <option value="37" @if(old('prefecture_id')=='37') selected  @endif>香川県</option>
                                        <option value="38" @if(old('prefecture_id')=='38') selected  @endif>愛媛県</option>
                                        <option value="39" @if(old('prefecture_id')=='39') selected  @endif>高知県</option>
                                        <option value="40" @if(old('prefecture_id')=='40') selected  @endif>福岡県</option>
                                        <option value="41" @if(old('prefecture_id')=='41') selected  @endif>佐賀県</option>
                                        <option value="42" @if(old('prefecture_id')=='42') selected  @endif>長崎県</option>
                                        <option value="43" @if(old('prefecture_id')=='43') selected  @endif>熊本県</option>
                                        <option value="44" @if(old('prefecture_id')=='44') selected  @endif>大分県</option>
                                        <option value="45" @if(old('prefecture_id')=='45') selected  @endif>宮崎県</option>
                                        <option value="46" @if(old('prefecture_id')=='46') selected  @endif>鹿児島県</option>
                                        <option value="47" @if(old('prefecture_id')=='47') selected  @endif>沖縄県</option>
                                    </select>

                                    @error('prefecture_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="inputAddress03"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ __('市町村区') }}　　<font color="red">必須</font></label>

                                <div class="col-md-6">
                                    <input id="inputAddress03" type="text" name="city" class="form-control" placeholder="大阪市西区阿波座"
                                    value="{{ empty(old('city')) ? (Auth::user()->city) : old('city')}}"
                                    required autocomplete="new-city">

                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputAddress04"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ __('番地') }}　　<font color="red">必須</font></label>

                                <div class="col-md-6">
                                    <input id="inputAddress04" type="text" name="block"
                                        class="form-control" placeholder="１丁目１３−１６"
                                        value="{{ empty(old('block')) ? (Auth::user()->block) : old('block')}}"
                                        required autocomplete="new-block">

                                    @error('block')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inputAddress05"
                                    class="col-md-4 col-form-label text-md-right">
                                    {{ __('建物名・部屋番号') }}　　</label>

                                <div class="col-md-6">
                                    <input id="inputAddress05" type="text" name="building"
                                        class="form-control" placeholder="松本フォレストビル501"
                                        value="{{ empty(old('building')) ? (Auth::user()->building) : old('building')}}">

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
                                    <button type="button" class="btn btn-outline-primary"
                                        onclick="location.href='/login_main';">キャンセル</button>
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
