@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">予約一覧</h2>

    <form action="{{ route('admin.bookings.index') }}" method="GET" class="row g-2 mb-4 bg-white p-3 rounded shadow-sm">
        <div class="col-auto">
            <input type="date" name="date" value="{{ request('date') }}" class="form-control form-control-sm">
        </div>
        <div class="col-auto">
            <select name="status" class="form-select form-select-sm">
                <option value="">すべてのステータス</option>
                <option value="pending" @selected(request('status') === 'pending')>未対応</option>
                <option value="confirmed" @selected(request('status') === 'confirmed')>確定</option>
                <option value="done" @selected(request('status') === 'done')>来店済み</option>
            </select>
        </div>
        <div class="col-auto">
            <input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="お名前で検索" class="form-control form-control-sm">
        </div>
        <div class="col-auto">
            <button class="btn btn-dark btn-sm">検索</button>
            <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline-dark btn-sm">クリア</a>
        </div>
    </form>

    <table class="table table-striped bg-white rounded shadow-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>日付</th>
                <th>時間</th>
                <th>コース</th>
                <th>料金</th>
                <th>ステータス</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach($bookings as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->name }}</td>
                    <td>{{ $b->date }}</td>
                    <td>{{ $b->time }}</td>

                    <td>{{ $b->course }}</td>

                    <td>¥{{ number_format($b->price) }}</td>

                    <td>
                        <form action="{{ route('admin.bookings.update', $b->id) }}" method="POST">
                            @csrf @method('PUT')

                            <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                <option value="pending" @selected($b->status === 'pending')>未対応</option>
                                <option value="confirmed" @selected($b->status === 'confirmed')>確定</option>
                                <option value="done" @selected($b->status === 'done')>来店済み</option>
                            </select>
                        </form>
                    </td>

                    <td>
                        <a href="{{ route('admin.bookings.show', $b->id) }}" class="btn btn-outline-dark btn-sm">
                            詳細
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    {{ $bookings->links() }}
@endsection
