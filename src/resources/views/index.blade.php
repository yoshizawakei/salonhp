@extends("layouts.app")

@section("css")
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section("content")
    <div class="hero-section d-flex align-items-center">
        <div class="container text-center text-white">
            <span class="hero-eyebrow">Private Salon</span>
            <h1 class="display-4 fw-bold mt-2">{{ config('salon.name') }}</h1>
            <p class="lead">{{ config('salon.tagline') }}</p>

            <a href="/booking" class="btn btn-brand-light btn-lg mt-3 shadow-sm">
                予約する
            </a>
        </div>
    </div>

    <!-- Services -->
    <section class="container py-5">
        <h2 class="section-title text-center mb-5">Service Menu</h2>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="service-card shadow-sm">
                    <img src="{{ asset('img/119675B9-0960-4193-ADC9-CFD191C778A1.jpeg') }}" class="service-img"
                        alt="アロママッサージ">
                    <div class="p-4">
                        <h3 class="fw-bold">ボディトリートメント</h3>
                        <p>植物由来のアロマオイルを贅沢に使用し、深いリラクゼーションへ導きます。</p>
                        <a href="/booking" class="btn btn-brand-outline">予約する</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card shadow-sm">
                    <img src="{{ asset('img/E900F9F6-9953-4B21-84A6-7D61050AB525.jpeg') }}" class="service-img"
                        alt="フェイシャルエステ">
                    <div class="p-4">
                        <h3 class="fw-bold">フェイシャルエステ</h3>
                        <p>お肌の悩みに合わせたケアで、透明感あふれる素肌へ。</p>
                        <a href="/booking" class="btn btn-brand-outline">予約する</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card shadow-sm">
                    <img src="{{ asset('img/0B4BBCD1-F267-4D6A-8249-BF6E330356F5.jpeg') }}" class="service-img" alt="ヘッドスパ">
                    <div class="p-4">
                        <h3 class="fw-bold">ドライヘッドスパ</h3>
                        <p>頭皮・目元の疲れを集中ケア。癒やしと快眠へ導きます。</p>
                        <a href="/booking" class="btn btn-brand-outline">予約する</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS -->
    <section class="py-5" style="background-color: var(--bg-soft);">
        <div class="container">
            <h2 class="section-title d-block text-center mb-5">お知らせ</h2>

            @if($news->count())
                <div class="row g-4">
                    @foreach($news as $item)
                        <div class="col-md-4">
                            <div class="news-card p-4">
                                <small class="text-muted">{{ $item->created_at->format('Y.m.d') }}</small>
                                <h3 class="h6 fw-bold mt-2">{{ $item->title }}</h3>
                                <p class="mb-0 text-muted">{{ \Illuminate\Support\Str::limit($item->body, 60) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-muted">現在お知らせはありません。</p>
            @endif
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section text-center text-white">
        <h2 class="fw-bold text-white">心と体を、やさしくときほぐす時間を。</h2>
        <p class="mt-2">初回限定メニューもご用意しております。</p>
        <a href="/booking" class="btn btn-brand-light btn-lg mt-3">予約はこちら</a>
    </section>

@endsection