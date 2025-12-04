@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">新規コース追加</h2>

    <form action="{{ route('admin.courses.store') }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-bold">コース名</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">説明</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">施術時間（分）</label>
            <input type="number" name="duration" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">料金（円）</label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">並び順</label>
            <input type="number" name="sort_order" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">公開状態</label>
            <select name="is_active" class="form-select">
                <option value="1">公開</option>
                <option value="0">非公開</option>
            </select>
        </div>

        <button class="btn btn-dark w-100">登録する</button>
    </form>
@endsection