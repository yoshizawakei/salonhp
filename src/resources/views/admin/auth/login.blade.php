<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Varjo 管理者ログイン</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Admin Login CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin-login.css') }}">
</head>

<body class="admin-login-bg">

    <div class="login-container">
        <div class="login-card shadow-lg">

            <div class="text-center mb-4">
                <img src="{{ asset('img/varjo_logo.png') }}" class="admin-logo" alt="Varjo ロゴ">
                <h2 class="login-title">Administrator Login</h2>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label text-light">メールアドレス</label>
                    <input type="email" name="email" class="form-control login-input" required autofocus>
                </div>

                <div class="mb-4">
                    <label class="form-label text-light">パスワード</label>
                    <input type="password" name="password" class="form-control login-input" required>
                </div>

                <button type="submit" class="btn btn-gold w-100 py-2">
                    ログイン
                </button>

            </form>
        </div>
    </div>

</body>

</html>