<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>{{ config('salon.name') }} 管理画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@700&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    <style>
        body {
            background: var(--bg-soft);
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            padding-top: 40px;
        }

        .sidebar form {
            padding-left: 12px;
        }

        .content {
            margin-left: 260px;
            padding: 40px;
        }

        .nav-title {
            margin-left: 20px;
        }
    </style>

    @yield('css')
</head>

<body>
    <div class="sidebar admin-sidebar">
        <div class="nav-title mb-4">
            @include('partials.logo', ['size' => 26])
        </div>

        <a href="{{ route('admin.dashboard') }}">ダッシュボード</a>
        <a href="{{ route('admin.bookings.index') }}">予約管理</a>
        <a href="{{ route('admin.users.index') }}">顧客管理</a>
        <a href="{{ route('admin.courses.index') }}">コース管理</a>
        <a href="{{ route('admin.news.index') }}">お知らせ管理</a>
        <a href="{{ route('admin.sales.index') }}">売上管理</a>

        <form action="{{ route('admin.logout') }}" method="POST" class="mt-4 text-left">
            @csrf
            <button class="btn btn-outline-light btn-sm">ログアウト</button>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
