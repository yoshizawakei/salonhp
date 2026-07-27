@extends('admin.layouts.app')

@section('content')
    <h2 class="fw-bold mb-4">予約詳細</h2>

    <div class="row g-4">

        {{-- 左：予約情報 --}}
        <div class="col-md-7">
            <div class="card-salon p-4">

                <h5 class="fw-bold mb-3">
                    予約ID：#{{ $booking->id }}
                </h5>

                <table class="table table-bordered mb-0">
                    <tr>
                        <th class="bg-light" style="width: 30%;">お名前</th>
                        <td>{{ $booking->name }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">メールアドレス</th>
                        <td>{{ $booking->email }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">日付</th>
                        <td>{{ $booking->date }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">時間</th>
                        <td>{{ $booking->time }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">コース</th>
                        <td>{{ $booking->course }}</td>
                    </tr>
                    @if ($booking->options)
                        <tr>
                            <th class="bg-light">追加オプション</th>
                            <td>{{ $booking->options }}</td>
                        </tr>
                    @endif
                    <tr>
                        <th class="bg-light">施術時間</th>
                        <td>{{ $booking->duration }} 分</td>
                    </tr>
                    <tr>
                        <th class="bg-light">料金</th>
                        <td>¥{{ number_format($booking->price) }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">ステータス</th>
                        <td>
                            @if ($booking->status === 'pending')
                                <span class="badge badge-status-pending">未対応</span>
                            @elseif ($booking->status === 'confirmed')
                                <span class="badge badge-status-confirmed">確定</span>
                            @elseif ($booking->status === 'done')
                                <span class="badge badge-status-done">来店済み</span>
                            @else
                                <span class="badge bg-secondary">{{ $booking->status }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th class="bg-light">登録日時</th>
                        <td>{{ $booking->created_at }}</td>
                    </tr>
                    <tr>
                        <th class="bg-light">更新日時</th>
                        <td>{{ $booking->updated_at }}</td>
                    </tr>
                </table>
            </div>
        </div>

        {{-- 右：ステータス変更／メモ --}}
        <div class="col-md-5">
            <div class="card-salon p-4 mb-4">
                <h5 class="fw-bold mb-3">ステータス・メモ編集</h5>

                <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-bold">ステータス</label>
                        <select name="status" class="form-select">
                            <option value="pending" @selected($booking->status === 'pending')>未対応</option>
                            <option value="confirmed" @selected($booking->status === 'confirmed')>確定</option>
                            <option value="done" @selected($booking->status === 'done')>来店済み</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">メモ（施術内容・注意事項等）</label>
                        <textarea name="notes" rows="5" class="form-control">{{ old('notes', $booking->notes) }}</textarea>
                    </div>

                    <button class="btn btn-brand w-100">更新する</button>
                </form>
            </div>

            {{-- カルテリンク（ユーザー連携している場合） --}}
            @if (!empty($booking->user_id) && $booking->user)
                <div class="card-salon p-4">
                    <h5 class="fw-bold mb-2">カルテ情報</h5>
                    <p class="mb-2">{{ $booking->user->name }} 様</p>
                    <a href="{{ route('admin.users.show', $booking->user_id) }}" class="btn btn-outline-secondary btn-sm">
                        顧客カルテを開く
                    </a>
                </div>
            @endif
        </div>

    </div>

    <a href="{{ route('admin.bookings.index') }}" class="btn btn-link mt-4">&laquo; 予約一覧に戻る</a>
@endsection