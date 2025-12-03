@extends('layouts.admin')

@section('content')
    <h2 class="fw-bold mb-4">予約編集</h2>

    <div class="card shadow-sm p-4">

        <form action="/admin/bookings/{{ $booking->id }}" method="POST">
            @csrf
            @method('PUT')

            {{-- ステータス --}}
            <div class="mb-3">
                <label class="form-label">ステータス</label>
                <select name="status" class="form-select">
                    <option value="pending" @selected($booking->status == 'pending')>未対応</option>
                    <option value="confirmed" @selected($booking->status == 'confirmed')>確定</option>
                    <option value="done" @selected($booking->status == 'done')>来店済み</option>
                </select>
            </div>

            {{-- メモ --}}
            <div class="mb-3">
                <label class="form-label">予約メモ</label>
                <textarea name="notes" class="form-control" rows="4">{{ $booking->notes }}</textarea>
            </div>

            {{-- 料金変更（任意） --}}
            <div class="mb-3">
                <label class="form-label">料金（変更する場合のみ）</label>
                <input type="number" name="price" class="form-control" value="{{ $booking->price }}">
            </div>

            <button class="btn btn-dark px-4">更新する</button>
            <a href="/admin/bookings" class="btn btn-outline-dark ms-2">戻る</a>
        </form>

    </div>

@endsection