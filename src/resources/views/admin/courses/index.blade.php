@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">コース管理</h2>

    <a href="{{ route('admin.courses.create') }}" class="btn btn-dark mb-3">新規コース追加</a>

    <table class="table table-striped table-bordered bg-white shadow-sm">
        <thead class="table-dark">
            <tr>
                <th>並び順</th>
                <th>コース名</th>
                <th>時間</th>
                <th>料金</th>
                <th>公開</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach($courses as $c)
                <tr>
                    <td>{{ $c->sort_order }}</td>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->duration }} 分</td>
                    <td>¥{{ number_format($c->price) }}</td>
                    <td>
                        @if($c->is_active)
                            <span class="badge bg-success">公開中</span>
                        @else
                            <span class="badge bg-secondary">非公開</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.courses.edit', $c->id) }}" class="btn btn-outline-dark btn-sm">編集</a>
                        <form action="{{ route('admin.courses.destroy', $c->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection