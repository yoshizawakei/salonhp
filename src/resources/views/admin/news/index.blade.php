@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">お知らせ一覧</h2>

    <a href="{{ route('admin.news.create') }}" class="btn btn-dark mb-3">新規投稿</a>

    <table class="table table-striped bg-white shadow-sm rounded">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>日付</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach($news as $n)
                <tr>
                    <td>{{ $n->title }}</td>
                    <td>{{ $n->created_at->format('Y.m.d') }}</td>
                    <td>
                        <a href="{{ route('admin.news.edit', $n->id) }}" class="btn btn-outline-dark btn-sm">編集</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $news->links() }}
@endsection