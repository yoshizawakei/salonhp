<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO：タイトル -->
    <title>{{ config('salon.name') }} | {{ config('salon.description') }}</title>

    <!-- SEO：説明文 -->
    <meta name="description" content="{{ config('salon.description') }}">

    <!-- canonical -->
    <link rel="canonical" href="{{ config('salon.url') }}/">

    <!-- OGP（SNS向け） -->
    <meta property="og:title" content="{{ config('salon.name') }}">
    <meta property="og:description" content="{{ config('salon.tagline') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('salon.url') }}/">
    <meta property="og:image" content="{{ config('salon.url') }}/img/ogp.jpg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- 見出し：Shippori Mincho（上品な明朝） / 本文：Noto Sans JP -->
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho:wght@700&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- 共通CSS -->
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">

    @yield("css")

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BeautySalon",
            "name": "{{ config('salon.name') }}",
            "address": {
                "@type": "PostalAddress",
                "addressLocality": "{{ config('salon.address_locality') }}",
                "addressRegion": "{{ config('salon.address_region') }}"
            },
            "url": "{{ config('salon.url') }}/",
            "telephone": "{{ config('salon.tel') }}",
            "openingHours": "Mo-Su {{ config('salon.business_hours') }}"
        }
    </script>

</head>


<body>

    {{-- ヘッダー --}}
    <header class="site-header shadow-sm mb-4">
        <nav class="navbar navbar-expand-lg container py-3">

            <a class="navbar-brand" href="/">
                @include('partials.logo')
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
                            <span class="nav-link fw-bold" style="color: var(--brand-main);">
                                {{ Auth::user()->name }}さん
                            </span>
                        </li>
                        <li class="nav-item">
                            <form action="/logout" method="post" class="d-inline">
                                @csrf
                                <button class="btn btn-sm btn-brand-outline">ログアウト</button>
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
    <footer class="site-footer text-center py-4">
        <div class="mb-2">
            @include('partials.logo')
        </div>
        <small>&copy; {{ date('Y') }} {{ config('salon.name') }}</small>
    </footer>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    @yield("js")
</body>

</html>
