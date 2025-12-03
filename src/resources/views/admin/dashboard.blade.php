@extends('admin.layout')

@section('title', 'ダッシュボード')

@section('content')
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card-salon p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="fw-semibold mb-1">本日の予約</h6>
                        <div class="fs-3 fw-bold">{{ $todayBookings ?? 0 }}</div>
                    </div>
                    <img src="{{ asset('img/31A1D0F0-F2B4-43E2-BEB9-39EFC884AC69.jpeg') }}"
                         class="img-fluid rounded" style="max-width:90px;" alt="施術">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-salon p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="fw-semibold mb-1">未対応のお問い合わせ</h6>
                        <div class="fs-3 fw-bold">{{ $pendingContacts ?? 0 }}</div>
                    </div>
                    <img src="{{ asset('img/398CFA77-2191-4C45-8281-B8442A3E3814.jpeg') }}"
                         class="img-fluid rounded" style="max-width:90px;" alt="カウンセリング">
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-salon p-3 h-100">
                <div class="d-flex align-items-center">
                    <div class="flex-grow-1">
                        <h6 class="fw-semibold mb-1">登録ユーザー数</h6>
                        <div class="fs-3 fw-bold">{{ $userCount ?? 0 }}</div>
                    </div>
                    <img src="{{ asset('img/FD2D2B55-12AB-4D7B-95A2-4804514D8B8C.jpeg') }}"
                         class="img-fluid rounded" style="max-width:90px;" alt="ティータイム">
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <h2 class="h6 fw-bold mb-3">最新の予約</h2>
        <div class="card-salon p-3">
            <table class="table table-sm align-middle mb-0">
                <thead>
                    <tr>
                        <th>日付</th>
                        <th>時間</th>
                        <th>お名前</th>
                        <th>コース</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestBookings ?? [] as $booking)
                        <tr>
                            <td>{{ $booking->date }}</td>
                            <td>{{ $booking->time }}</td>
                            <td>{{ $booking->name }}</td>
                            <td>{{ $booking->course }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">予約はまだありません。</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
