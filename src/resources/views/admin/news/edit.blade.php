@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">お知らせを編集</h2>

    <form action="{{ route('admin.news.update', $news->id) }}" method="POST" class="card-salon p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">タイトル</label>
            <input type="text" name="title" value="{{ old('title', $news->title) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">内容</label>
            <textarea name="body" class="form-control" rows="5">{{ old('body', $news->body) }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="published" value="1" class="form-check-input" id="published" {{ old('published', $news->published) ? 'checked' : '' }}>
            <label class="form-check-label" for="published">公開する</label>
        </div>

        <button class="btn btn-brand">更新する</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-brand-outline ms-2">戻る</a>
    </form>
@endsection
