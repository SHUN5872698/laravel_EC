<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">  --}}
    {{--  <script src="{{ asset('js/fixme.js') }}"></script> --}}
    @yield('css')
    <style>
    </style>
</head>

<body>
    @section('menubar')
    <div class="container-md-">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="{{ url('/') }}">Smart Shop</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="/search?category_master=iPhone">iPhone <span class="sr-only">(current)</span>
                        </a></li>
                    <li class="nav-item active"><a class="nav-link" href="/search?category_master=Xperia">Xperia <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item active"><a class="nav-link" href="/search?category_master=Galaxy">Galaxy <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item active"><a class="nav-link" href="/search?category_master=AQUOS">AQUOS<span class="sr-only">(current)</span></a></li>
                </ul>
                <form class="form-inline">
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item dropdown m-2 my-sm-0">
                            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">こんにちは、ログイン<br>
                                アカウント機能</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="nav-link" href="{{ route('login') }}">
                                    <font color="black">ログイン<span class="sr-only">(current)</span>
                                </a>
                                <a class="nav-link" href="/register">
                                    <font color="black">新規登録<span class="sr-only">(current)</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </nav>

        <main class="py-4">@yield('content')</main>



        @section('footer')
        <div class="footer">
            &copy;right 2020 fujii
        </div>
    </div>
    {{--  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>  --}}
</body>

</html>
