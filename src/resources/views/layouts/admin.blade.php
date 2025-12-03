<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varjo 管理画面</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- アイコン --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    {{-- 管理画面CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @yield('css')
</head>

<body class="bg-light">

    <div class="d-flex">

        {{-- サイドバー --}}
        <nav class="admin-sidebar bg-dark text-white p-3">

            <div class="text-center mb-4">
                <img src="{{ asset('img/logo.png') }}" height="50" class="mb-2">
                <h5 class="fw-bold">Varjo Admin</h5>
            </div>

            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="/admin" class="nav-link text-white {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2 me-2"></i>ダッシュボード
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/bookings"
                        class="nav-link text-white {{ request()->is('admin/bookings*') ? 'active' : '' }}">
                        <i class="bi bi-calendar-check me-2"></i>予約管理
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/users"
                        class="nav-link text-white {{ request()->is('admin/users*') ? 'active' : '' }}">
                        <i class="bi bi-people me-2"></i>顧客カルテ
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/courses"
                        class="nav-link text-white {{ request()->is('admin/courses*') ? 'active' : '' }}">
                        <i class="bi bi-list-ul me-2"></i>コース管理
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/news"
                        class="nav-link text-white {{ request()->is('admin/news*') ? 'active' : '' }}">
                        <i class="bi bi-megaphone me-2"></i>お知らせ
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/sales"
                        class="nav-link text-white {{ request()->is('admin/sales*') ? 'active' : '' }}">
                        <i class="bi bi-currency-yen me-2"></i>売上管理
                    </a>
                </li>
            </ul>

            <form action="/logout" method="POST" class="mt-4 text-center">
                @csrf
                <button class="btn btn-outline-light w-100">ログアウト</button>
            </form>
        </nav>

        {{-- メインコンテンツ --}}
        <main class="admin-main p-4 w-100">
            @yield('content')
        </main>

    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @yield('js')
</body>

</html>