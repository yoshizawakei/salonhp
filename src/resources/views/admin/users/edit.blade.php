@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">顧客情報を編集</h2>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="card-salon p-4">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label fw-bold">名前</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">メールアドレス</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">メモ（施術内容・注意事項・好みなど）</label>
            <textarea name="memo" rows="5" class="form-control">{{ old('memo', $user->memo) }}</textarea>
        </div>

        <button class="btn btn-brand">更新する</button>
    </form>

@endsection