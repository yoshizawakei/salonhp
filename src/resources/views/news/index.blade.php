@extends("layouts.app")

@section("content")

    <div class="container">

        <h2 class="fw-bold text-center mb-4">お知らせ</h2>

        <div class="row justify-content-center">

            @foreach ($news as $item)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="fw-bold">{{ $item->title }}</h5>
                            <p class="text-muted small">{{ $item->created_at->format('Y.m.d') }}</p>
                            <p>{{ Str::limit(strip_tags($item->body), 80) }}</p>
                            <a href="/news/{{ $item->id }}" class="btn btn-sm btn-outline-dark">続きを読む</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        {{ $news->links() }}

    </div>

@endsection