<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relaxation Salon</title>

    {{-- 既存CSS --}}
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- ページ固有CSS --}}
    @yield("css")
</head>

<body class="bg-light">

    {{-- ナビ --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">

            <a class="navbar-brand fw-bold" href="/">Relaxation Salon</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navMenu">
                <ul class="navbar-nav align-items-center">

                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link fw-semibold" href="/profile">
                                {{ Auth::user()->name }} さん
                            </a>
                        </li>

                        <li class="nav-item ms-3">
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="btn btn-outline-dark">ログアウト</button>
                            </form>
                        </li>

                    @else
                        <li class="nav-item"><a class="nav-link" href="/">ホーム</a></li>
                        <li class="nav-item"><a class="nav-link" href="/booking">予約</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">サービス</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">お問い合わせ</a></li>
                        <li class="nav-item ms-3">
                            <a class="btn btn-dark" href="/login">ログイン</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div style="padding-top: 90px;">
        @yield("content")
    </div>

    <footer class="bg-dark text-white text-center py-4 mt-5">
        <p class="mb-0 small">© 2025 Relaxation Salon</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
