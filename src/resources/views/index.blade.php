@extends("layouts.app")

@section("css")
<link rel="stylesheet" href={{ asset("css/index.css") }}>
@endsection

@section("content")
    <main>
        <section class="hero">
            <h1>至福のリラクゼーション体験</h1>
            <p>心と体を癒す、特別な時間を提供します。</p>
            <a href="/booking" class="button">今すぐ予約</a>
        </section>
        <section class="services">
            <h2>サービス紹介</h2>
            <div class="service-list">
                <div class="service-item">
                    <img src="{{ asset("img/119675B9-0960-4193-ADC9-CFD191C778A1.jpeg") }}" alt="アロママッサージ">
                    <h3>アロママッサージ</h3>
                    <p>厳選されたアロマオイルを使用し、深いリラクゼーションを提供します。</p>
                </div>
                <div class="service-item">
                    <img src="{{ asset("img/E900F9F6-9953-4B21-84A6-7D61050AB525.jpeg") }}" alt="フェイシャルエステ">
                    <h3>フェイシャルエステ</h3>
                    <p>プロの技術で、お肌の悩みを解消し、輝く素肌へ導きます。</p>
                </div>
                <div class="service-item">
                    <img src="{{ asset("img/0B4BBCD1-F267-4D6A-8249-BF6E330356F5.jpeg") }}" alt="ヘッドスパ">
                    <h3>ヘッドスパ</h3>
                    <p>頭皮のコリをほぐし、心身ともにリフレッシュできます。</p>
                </div>
            </div>
        </section>
        <section class="reservation">
            <h2>簡単予約</h2>
            <p>オンラインで24時間いつでも予約可能です。</p>
            <a href="/booking" class="button">予約ページへ</a>
        </section>
    </main>
@endsection