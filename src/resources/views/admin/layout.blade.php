<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Varjo 管理画面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    @yield('css')
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            {{-- サイドバー --}}
            <nav class="col-md-2 d-none d-md-block admin-sidebar p-3">
                <div class="mb-4 text-center">
                    <img src="{{ asset('img/IMG_4506.PNG') }}" alt="Varjo ロゴ" class="logo-image mb-2">
                    <div class="small">Varjo Admin</div>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}">ダッシュボード</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.bookings.index') }}">予約一覧</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.contacts.index') }}">お問い合わせ一覧</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.users.index') }}">ユーザー一覧</a>
                    </li>
                </ul>
            </nav>

            {{-- メイン --}}
            <main class="col-md-10 ms-sm-auto px-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="h5 mb-0">@yield('title', 'ダッシュボード')</h1>
                    <div class="d-flex align-items-center gap-2">
                        <span class="small text-muted">管理者ログイン中</span>
                        <a href="/" class="btn btn-sm btn-outline-secondary">サイトへ</a>
                    </div>
                </div>

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>