@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">顧客カルテ</h2>

    <div class="row g-4">

        {{-- 左：顧客基本情報 --}}
        <div class="col-md-5">
            <div class="bg-white p-4 rounded shadow-sm">
                <h4 class="fw-bold mb-3">{{ $user->name }} 様</h4>

                <table class="table table-bordered">
                    <tr>
                        <th class="bg-light" style="width: 30%;">名前</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">メール</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">登録日</th>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">メモ</th>
                        <td>{!! nl2br(e($user->memo)) !!}</td>
                    </tr>
                </table>

                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-dark w-100 mt-3">
                    顧客情報を編集
                </a>
            </div>
        </div>

        {{-- 右：来店履歴 --}}
        <div class="col-md-7">
            <div class="bg-white p-4 rounded shadow-sm">
                <h4 class="fw-bold mb-3">来店履歴</h4>

                @if($bookings->count() == 0)
                    <p class="text-muted">来店履歴はありません。</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>日付</th>
                                <th>時間</th>
                                <th>コース</th>
                                <th>料金</th>
                                <th>ステータス</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $b)
                                <tr>
                                    <td>{{ $b->date }}</td>
                                    <td>{{ $b->time }}</td>
                                    <td>{{ $b->course }}</td>
                                    <td>¥{{ number_format($b->price) }}</td>
                                    <td>
                                        @if($b->status === 'pending')
                                            <span class="badge bg-warning text-dark">未対応</span>
                                        @elseif($b->status === 'confirmed')
                                            <span class="badge bg-primary">確定</span>
                                        @else
                                            <span class="badge bg-success">来店済み</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif

            </div>
        </div>

    </div>

@endsection