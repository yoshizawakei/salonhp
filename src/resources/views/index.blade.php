@extends("layouts.app")

@section("css")
    <style>
        .hero-section {
            background: url('{{ asset("img/119675B9-0960-4193-ADC9-CFD191C778A1.jpeg") }}') center/cover no-repeat;
            height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .hero-content {
            background: rgba(0, 0, 0, 0.45);
            padding: 45px 55px;
            border-radius: 14px;
            text-align: center;
        }

        .service-img {
            height: 230px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
@endsection

@section("content")
    <main>

        {{-- HERO --}}
        <section class="hero-section mb-5">
            <div class="hero-content">
                <h1 class="display-5 fw-bold mb-3">至福のリラクゼーション体験</h1>
                <p class="lead mb-4">心と体を癒す、特別な時間を提供します。</p>
                <a href="/booking" class="btn btn-light btn-lg px-4 py-2">今すぐ予約</a>
            </div>
        </section>

        {{-- サービス紹介 --}}
        <section class="container mb-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3">サービス紹介</h2>
            </div>

            <div class="row gy-4">

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('img/119675B9-0960-4193-ADC9-CFD191C778A1.jpeg') }}" class="service-img">
                        <div class="card-body">
                            <h5 class="fw-semibold">アロママッサージ</h5>
                            <p class="text-muted">厳選オイルで極上の癒しを体験できます。</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('img/E900F9F6-9953-4B21-84A6-7D61050AB525.jpeg') }}" class="service-img">
                        <div class="card-body">
                            <h5 class="fw-semibold">フェイシャルエステ</h5>
                            <p class="text-muted">肌を整え、透明感のある美しさへ導きます。</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <img src="{{ asset('img/0B4BBCD1-F267-4D6A-8249-BF6E330356F5.jpeg') }}" class="service-img">
                        <div class="card-body">
                            <h5 class="fw-semibold">ヘッドスパ</h5>
                            <p class="text-muted">疲れた頭皮を癒し、深いリラックスを提供。</p>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        {{-- 予約 --}}
        <section class="py-5 bg-light">
            <div class="container text-center">
                <h2 class="fw-bold mb-3">簡単予約</h2>
                <p class="text-muted mb-4">オンラインで24時間いつでも予約できます。</p>
                <a href="/booking" class="btn btn-dark btn-lg">予約ページへ</a>
            </div>
        </section>

    </main>
@endsection

