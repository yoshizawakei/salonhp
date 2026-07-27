@extends("layouts.app")

@section("content")

    <div class="container" style="max-width:800px;">

        <h2 class="fw-bold mb-4">{{ $news->title }}</h2>
        <p class="text-muted">{{ $news->created_at->format('Y.m.d') }}</p>

        <div class="card-salon p-4">
            {!! nl2br(e($news->body)) !!}
        </div>

        <div class="mt-4">
            <a href="/news" class="btn btn-brand-outline">一覧に戻る</a>
        </div>

    </div>

@endsection