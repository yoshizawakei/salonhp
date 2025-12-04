@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">予約一覧</h2>

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
                                <option value="pending" @selected($b->status == 'pending')>未対応</option>
                                <option value="confirmed" @selected($b->status == 'confirmed')>確定</option>
                                <option value="done" @selected($b->status == 'done')>来店済み</option>
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
@endsection