<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>リラクゼーションサロン - モダンデザイン</title>
    <link rel="stylesheet" href={{ asset("css/sanitize.css") }}>
    <link rel="stylesheet" href={{ asset("css/common.css") }}>
    @yield("css")
</head>

<body>
    <header>
        <nav>
            <ul>
                @if (Auth::check())
                <li><a href="/profile">{{ Auth::user()->name }}さん</a></li>
                <form action="/logout" method="post">
                    <button>ログアウト</button>
                </form>
                @else
                <li><a href="/">ホーム</a></li>
                <li><a href="#">サービス</a></li>
                <li><a href="/booking">予約</a></li>
                <li><a href="#">お問い合わせ</a></li>
                <li><a href="/login">ログイン</a></li>
                @endif
            </ul>
        </nav>
    </header>

    @yield("content")

    <footer>
        <p>&copy; 2023 リラクゼーションサロン</p>
    </footer>
</body>

</html>