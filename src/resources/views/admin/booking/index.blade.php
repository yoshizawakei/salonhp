@extends('layouts.admin')

@section('content')
    <h2 class="fw-bold mb-4">予約一覧</h2>

    {{-- 検索フォーム --}}
    <div class="card shadow-sm p-3 mb-4">
        <form action="" method="GET" class="row g-3">

            <div class="col-md-3">
                <label class="form-label">日付</label>
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>

            <div class="col-md-3">
                <label class="form-label">ステータス</label>
                <select name="status" class="form-select">
                    <option value="">すべて</option>
                    <option value="pending" @selected(request('status') == 'pending')>未対応</option>
                    <option value="confirmed" @selected(request('status') == 'confirmed')>確定</option>
                    <option value="done" @selected(request('status') == 'done')>来店済み</option>
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label">名前</label>
                <input type="text" name="keyword" class="form-control" value="{{ request('keyword') }}">
            </div>

            <div class="col-md-3 d-flex align-items-end">
                <button class="btn btn-dark w-100">検索</button>
            </div>

        </form>
    </div>

    {{-- 予約一覧 --}}
    <div class="table-responsive">
        <table class="table table-hover bg-white shadow-sm">
            <thead class="table-light">
                <tr>
                    <th>日付</th>
                    <th>時間</th>
                    <th>名前</th>
                    <th>コース</th>
                    <th>料金</th>
                    <th>ステータス</th>
                    <th>詳細</th>
                </tr>
            </thead>

            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->date }}</td>
                        <td>{{ $booking->time }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->course }}</td>
                        <td>{{ number_format($booking->price) }}円</td>
                        <td>
                            @if($booking->status == 'pending')
                                <span class="badge bg-warning text-dark">未対応</span>
                            @elseif($booking->status == 'confirmed')
                                <span class="badge bg-primary">確定</span>
                            @else
                                <span class="badge bg-success">来店済み</span>
                            @endif
                        </td>
                        <td>
                            <a href="/admin/bookings/{{ $booking->id }}" class="btn btn-sm btn-outline-dark">
                                詳細
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- ページネーション --}}
    <div class="mt-3">
        {{ $bookings->links() }}
    </div>

@endsection