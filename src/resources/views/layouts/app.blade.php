<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO：タイトル -->
    <title>Private Salon Varjo | アロマ・フェイシャル・ヘッドスパ | 東京の完全予約制プライベートサロン</title>

    <!-- SEO：説明文 -->
    <meta name="description" content="東京の完全予約制プライベートサロン『Varjo』。アロマトリートメント・フェイシャル・ヘッドスパであなたの疲れを癒す上質な時間をご提供します。">

    <!-- SEO：キーワード（任意） -->
    <meta name="keywords" content="アロマ, アロママッサージ, エステ, フェイシャル, ヘッドスパ, プライベートサロン, 東京, 予約">

    <!-- canonical -->
    <link rel="canonical" href="https://your-domain.com/">

    <!-- OGP（SNS向け） -->
    <meta property="og:title" content="Private Salon Varjo | 東京のプライベートサロン">
    <meta property="og:description" content="アロマ・フェイシャル・ヘッドスパで癒しの時間を。完全予約制の隠れ家サロン。">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://your-domain.com/">
    <meta property="og:image" content="https://your-domain.com/img/ogp.jpg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 本文：Kosugi Maru（柔らかい） -->
    <link href="https://fonts.googleapis.com/css2?family=Kosugi+Maru&display=swap" rel="stylesheet">

    <!-- 見出し：Noto Sans JP（上品で柔らかいゴシック） -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">



    <!-- 共通CSS -->
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    @yield("css")

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BeautySalon",
            "name": "Private Salon Varjo",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "東京都◯◯区",
                "addressRegion": "Tokyo"
            },
            "url": "https://your-domain.com/",
            "telephone": "03-xxxx-xxxx",
            "openingHours": "Mo-Su 10:00-20:00"
        }
    </script>

</head>


<body class="bg-light">

    {{-- ヘッダー --}}
    <header class="shadow-sm bg-white mb-4">
        <nav class="navbar navbar-expand-lg navbar-light container py-3">

            {{-- ロゴ --}}
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="{{ asset('img/IMG_4506.PNG') }}" alt="Varjoロゴ" height="40" class="me-2">
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