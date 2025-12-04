@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">お知らせを投稿</h2>

    <form action="{{ route('admin.news.store') }}" method="POST" class="bg-white p-4 shadow-sm rounded">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-bold">タイトル</label>
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">内容</label>
            <textarea name="body" class="form-control" rows="5"></textarea>
        </div>

        <button class="btn btn-dark">保存</button>
    </form>
@endsection