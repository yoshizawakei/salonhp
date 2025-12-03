@extends('layouts.admin')

@section('content')
    <h2 class="fw-bold mb-4">予約詳細</h2>

    <div class="card shadow-sm p-4">

        <h4 class="fw-bold mb-3">{{ $booking->name }} 様</h4>

        <table class="table table-bordered bg-white">
            <tr><th class="bg-light">日付</th><td>{{ $booking->date }}</td></tr>
            <tr><th class="bg-light">時間</th><td>{{ $booking->time }}</td></tr>
            <tr><th class="bg-light">コース</th><td>{{ $booking->course }}</td></tr>
            <tr><th class="bg-light">施術時間</th><td>{{ $booking->duration }}分</td></tr>
            <tr><th class="bg-light">料金</th><td>{{ number_format($booking->price) }}円</td></tr>
            <tr><th class="bg-light">メール</th><td>{{ $booking->email }}</td></tr>
            <tr><th class="bg-light">電話</th><td>{{ $booking->tel }}</td></tr>
            <tr><th class="bg-light">メモ</th><td>{{ $booking->notes }}</td></tr>
            <tr>
                <th class="bg-light">ステータス</th>
                <td>
                    @if($booking->status == 'pending')
                        <span class="badge bg-warning text-dark">未対応</span>
                    @elseif($booking->status == 'confirmed')
                        <span class="badge bg-primary">確定</span>
                    @else
                        <span class="badge bg-success">来店済み</span>
                    @endif
                </td>
            </tr>
        </table>

        <div class="mt-3">
            <a href="/admin/bookings/{{ $booking->id }}/edit" class="btn btn-primary">編集</a>
            <a href="/admin/bookings" class="btn btn-outline-dark ms-2">一覧に戻る</a>
        </div>

    </div>

    @if($booking->user)
        <div class="mt-4">
            <h4 class="fw-bold">顧客カルテ</h4>
            <a href="/admin/users/{{ $booking->user_id }}" class="btn btn-sm btn-secondary mt-2">
                {{ $booking->user->name }} さんのカルテを見る
            </a>
        </div>
    @endif

@endsection
