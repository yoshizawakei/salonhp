<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Varjo 管理画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f7f4f1;
        }

        .sidebar {
            width: 240px;
            height: 100vh;
            position: fixed;
            background: #2b2b2b;
            color: #fff;
            padding-top: 40px;
        }

        .sidebar a {
            color: #fff;
            display: block;
            padding: 12px 20px;
            text-decoration: none;
        }

        .sidebar form {
            padding-left: 12px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.1);
        }

        .content {
            margin-left: 260px;
            padding: 40px;
        }

        .nav-title {
            font-size: 1.4rem;
            font-weight: bold;
            margin-left: 20px;
        }
    </style>

    @yield('css')
</head>

<body>
    <div class="sidebar">
        <div class="nav-title mb-4">Varjo Admin</div>

        <a href="{{ route('admin.dashboard') }}">ダッシュボード</a>
        <a href="{{ route('admin.bookings.index') }}">予約管理</a>
        <a href="{{ route('admin.users.index') }}">顧客管理</a>
        <a href="{{ route('admin.courses.index') }}">コース管理</a>
        <a href="{{ route('admin.news.index') }}">お知らせ管理</a>
        <a href="{{ route('admin.sales.index') }}">売上管理</a>

        <form action="{{ route('admin.logout') }}" method="POST" class="mt-4 text-left">
            @csrf
            <button class="btn btn-outline-light">ログアウト</button>
        </form>
    </div>

    <div class="content">
        @yield('content')
    </div>

</body>

</html>