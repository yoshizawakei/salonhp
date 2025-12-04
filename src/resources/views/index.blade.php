@extends("layouts.app")

@section("css")
    <link rel="stylesheet" href="{{ asset('css/top.css') }}">
@endsection

@section("content")
    <div class="hero-section d-flex align-items-center">
        <div class="container text-center text-white">
            <img src="{{ asset('img/IMG_4506.PNG') }}" class="hero-logo" alt="Varjo ロゴ">
            <h1 class="display-4 fw-bold mt-4">Private Salon Varjo</h1>
            <p class="lead">あなただけの隠れ家サロンで、心身を美しく解き放つひととき。</p>

            <a href="/booking" class="btn btn-light btn-lg mt-3 shadow-sm rounded-pill">
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
                        <h3 class="fw-bold">アロマボディトリートメント</h3>
                        <p>植物由来のアロマオイルを贅沢に使用し、深いリラクゼーションへ導きます。</p>
                        <a href="/booking" class="btn btn-outline-dark rounded-pill">予約する</a>
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
                        <a href="/booking" class="btn btn-outline-dark rounded-pill">予約する</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="service-card shadow-sm">
                    <img src="{{ asset('img/0B4BBCD1-F267-4D6A-8249-BF6E330356F5.jpeg') }}" class="service-img" alt="ヘッドスパ">
                    <div class="p-4">
                        <h3 class="fw-bold">ドライヘッドスパ</h3>
                        <p>頭皮・目元の疲れを集中ケア。癒やしと快眠へ導きます。</p>
                        <a href="/booking" class="btn btn-outline-dark rounded-pill">予約する</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- NEWS -->
    <section class="bg-light py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4">お知らせ</h2>

            @if($news->count())
                <ul class="list-group list-group-flush">
                    @foreach($news as $item)
                        <li class="list-group-item py-3">
                            <strong>{{ $item->title }}</strong>
                            <p class="mb-1">{{ $item->body }}</p>
                            <small class="text-muted">{{ $item->created_at->format('Y.m.d') }}</small>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center text-muted">現在お知らせはありません。</p>
            @endif
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section text-center text-white">
        <h2 class="fw-bold">癒しのひとときを、Varjoで。</h2>
        <p class="mt-2">初回限定メニューもご用意しております。</p>
        <a href="/booking" class="btn btn-light btn-lg mt-3 rounded-pill">予約はこちら</a>
    </section>

@endsection