@extends('layouts.admin')

@section('content')

    <h2 class="fw-bold mb-4">ダッシュボード</h2>

    <div class="row">

        {{-- 今日の予約 --}}
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3 text-center">
                <h5>今日の予約</h5>
                <p class="display-6 fw-bold">{{ $todayBookings }}</p>
            </div>
        </div>

        {{-- 未対応予約 --}}
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3 text-center">
                <h5>未対応予約</h5>
                <p class="display-6 fw-bold">{{ $pending }}</p>
            </div>
        </div>

        {{-- 今月の売上 --}}
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3 text-center">
                <h5>今月の売上</h5>
                <p class="display-6 fw-bold">{{ number_format($monthlySales) }}円</p>
            </div>
        </div>

        {{-- 顧客数 --}}
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm p-3 text-center">
                <h5>登録顧客</h5>
                <p class="display-6 fw-bold">{{ $users }}</p>
            </div>
        </div>

    </div>

    <h4 class="fw-bold mt-4">最新の予約</h4>
    <div class="table-responsive">
        <table class="table table-striped bg-white mt-2">
            <thead>
                <tr>
                    <th>日付</th>
                    <th>時間</th>
                    <th>名前</th>
                    <th>コース</th>
                    <th>ステータス</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($latestBookings as $b)
                    <tr>
                        <td>{{ $b->date }}</td>
                        <td>{{ $b->time }}</td>
                        <td>{{ $b->name }}</td>
                        <td>{{ $b->course }}</td>
                        <td>{{ $b->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection