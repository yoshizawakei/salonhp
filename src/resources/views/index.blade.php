@extends("layouts.app")

@section("content")

    {{-- HERO --}}
    <section class="container-fluid p-0">
        <div class="hero position-relative">
            <img src="{{ asset('img/hero.jpg') }}" class="w-100 hero-img" alt="サロンイメージ">

            <div class="hero-overlay position-absolute top-50 start-50 translate-middle text-center text-white">
                <h1 class="display-4 fw-bold">深い癒しと、静かな時間。</h1>
                <p class="lead mt-3">Private Salon Varjoでは、心身のゆらぎを整える特別なケアをご提供します。</p>
                <a href="/booking" class="btn btn-lg btn-light mt-4 px-5">予約する</a>
            </div>
        </div>
    </section>

    {{-- NEWS --}}
    <section class="container my-5">
        <h2 class="text-center mb-4 fw-bold">お知らせ</h2>

        <div class="row justify-content-center">

            @forelse ($news as $item)
                <div class="col-md-4 mb-3">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="fw-bold">{{ $item->title }}</h5>
                            <p class="text-muted small">{{ $item->created_at->format('Y.m.d') }}</p>
                            <p>{{ Str::limit(strip_tags($item->body), 80) }}</p>
                            <a href="/news/{{ $item->id }}" class="btn btn-sm btn-outline-dark">続きを読む</a>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">お知らせはまだありません。</p>
            @endforelse

        </div>
    </section>

@endsection