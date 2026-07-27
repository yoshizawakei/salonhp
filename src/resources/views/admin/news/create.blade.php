@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">お知らせを投稿</h2>

    <form action="{{ route('admin.news.store') }}" method="POST" class="card-salon p-4">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-bold">タイトル</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">内容</label>
            <textarea name="body" class="form-control" rows="5">{{ old('body') }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="published" value="1" class="form-check-input" id="published" {{ old('published', true) ? 'checked' : '' }}>
            <label class="form-check-label" for="published">公開する</label>
        </div>

        <button class="btn btn-brand">保存</button>
    </form>
@endsection
