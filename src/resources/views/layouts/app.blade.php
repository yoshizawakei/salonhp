<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Private Salon Varjo</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- 共通CSS --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    @yield("css")
</head>

<body class="bg-light">

    {{-- ヘッダー --}}
    <header class="shadow-sm bg-white mb-4">
        <nav class="navbar navbar-expand-lg navbar-light container py-3">

            {{-- ロゴ --}}
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('img/logo.png') }}" alt="Varjoロゴ" height="40" class="me-2">
                <span class="fw-bold fs-4 text-dark">Private Salon Varjo</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse text-center" id="navMenu">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item"><a class="nav-link" href="/">ホーム</a></li>
                    <li class="nav-item"><a class="nav-link" href="/news">お知らせ</a></li>
                    <li class="nav-item"><a class="nav-link" href="/booking">予約</a></li>
                    <li class="nav-item"><a class="nav-link" href="/contact">お問い合わせ</a></li>

                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link fw-bold text-primary" href="/profile">
                                {{ Auth::user()->name }}さん
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-outline-secondary">ログアウト</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/login">ログイン</a></li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>

    {{-- メイン --}}
    <main class="mb-5">
        @yield("content")
    </main>

    {{-- フッター --}}
    <footer class="bg-dark text-white text-center py-4">
        <small>&copy; {{ date('Y') }} Private Salon Varjo</small>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @yield("js")
</body>

</html>