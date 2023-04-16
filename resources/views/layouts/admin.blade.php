<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    {{-- 後の章で説明します --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
    <title>@yield('title')</title>

    <!-- Scripts -->
    {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- Laravel標準で用意されているCSSを読み込みます --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- この章の後半で作成するCSSを読み込みます --}}
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        {{-- 画面上部に表示するナビゲーションバーです。 --}}
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Laravel</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 x-3">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('admin.review.index') }}">投稿一覧</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('admin.review.create') }}">新規投稿</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="{{ route('admin.review.favoriteIndex') }}">お気に入りの投稿</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            {{-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> --}}
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                name="cond_title">
                            <button class="btn btn-outline-primary" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                {{-- <nav class="navbar navbar-expand-md navbar-dark navbar-laravel">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li>ITEM</li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href={{ route('admin.review.index') }} data-toggle="collapse"
                                data-target=".navbar-collapse.show">Top</a>
                        </li>
                        <li class="nav-item">
                            <a class=nav-link href="#">HOME
                        </li>
                    </ul>
                </div> --}}
            </nav>
        </div>
        {{-- ここまでナビゲーションバー --}}

        <main class="py-4">
            {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
            @yield('content')
        </main>
    </div>
</body>

</html>
