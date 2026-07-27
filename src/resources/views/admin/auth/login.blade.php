<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>{{ config('salon.name') }} 管理者ログイン</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- フォント --}}
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@700&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">

    {{-- 共通デザイン + 管理者ログイン専用 --}}
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-login.css') }}">
</head>

<body class="admin-login-bg">

    <div class="login-container">
        <div class="login-card shadow-lg text-center">

            <div class="mb-4">
                @include('partials.logo', ['size' => 40])
                <h2 class="login-title mt-2">Administrator Login</h2>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}" class="text-start">
                @csrf

                <div class="mb-3">
                    <label class="form-label">メールアドレス</label>
                    <input type="email" name="email" class="form-control login-input" required autofocus>
                </div>

                <div class="mb-4">
                    <label class="form-label">パスワード</label>
                    <input type="password" name="password" class="form-control login-input" required>
                </div>

                <button type="submit" class="btn btn-brand w-100 py-2">
                    ログイン
                </button>

            </form>
        </div>
    </div>

</body>

</html>
