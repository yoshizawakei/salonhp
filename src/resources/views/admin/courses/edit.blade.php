@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">コースを編集</h2>

    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">コース名</label>
            <input type="text" name="name" value="{{ old('name', $course->name) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">カテゴリ</label>
            <input type="text" name="category" value="{{ old('category', $course->category) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">説明</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $course->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">施術時間（分）</label>
            <input type="number" name="duration" value="{{ old('duration', $course->duration) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">料金（円）</label>
            <input type="number" name="price" value="{{ old('price', $course->price) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">並び順</label>
            <input type="number" name="sort_order" value="{{ old('sort_order', $course->sort_order) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">区分</label>
            <select name="is_option" class="form-select">
                <option value="0" @selected(!$course->is_option)>コース（メインメニュー）</option>
                <option value="1" @selected($course->is_option)>オプション（追加メニュー）</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">公開状態</label>
            <select name="is_active" class="form-select">
                <option value="1" @selected($course->is_active)>公開</option>
                <option value="0" @selected(!$course->is_active)>非公開</option>
            </select>
        </div>

        <button class="btn btn-dark w-100">更新する</button>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-outline-dark w-100 mt-2">戻る</a>
    </form>
@endsection
