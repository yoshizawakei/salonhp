@extends('admin.layouts.app')

@section('content')
    <h1 class="fw-bold mb-4">ダッシュボード</h1>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="p-4 card-salon admin-stat-card">
                <h4>今日の予約</h4>
                <p class="display-6 fw-bold">{{ $todayBookings }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 card-salon admin-stat-card">
                <h4>今日の売上</h4>
                <p class="display-6 fw-bold">¥{{ number_format($todaySales) }}</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="p-4 card-salon admin-stat-card">
                <h4>新規顧客</h4>
                <p class="display-6 fw-bold">{{ $newUsers }}</p>
            </div>
        </div>

    </div>
@endsection