@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">顧客一覧</h2>

    <table class="table table-striped bg-white shadow-sm rounded">
        <thead>
            <tr>
                <th>ID</th>
                <th>名前</th>
                <th>メール</th>
                <th>登録日</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>{{ $u->created_at->format('Y.m.d') }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $u->id) }}" class="btn btn-brand-outline btn-sm">
                            詳細
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}

@endsection