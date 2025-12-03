@extends("layouts.app")

@section("content")
<div class="container">

    <h2 class="text-center fw-bold mb-4">予約フォーム</h2>

    <form action="{{ route('booking.confirm') }}" method="POST" class="mx-auto" style="max-width:700px;">
        @csrf

        {{-- 名前 --}}
        <div class="mb-3">
            <label class="form-label">お名前 *</label>
            <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
        </div>

        {{-- メール --}}
        <div class="mb-3">
            <label class="form-label">メールアドレス *</label>
            <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
        </div>

        {{-- 電話 --}}
        <div class="mb-3">
            <label class="form-label">電話番号（任意）</label>
            <input type="text" class="form-control" name="tel" value="{{ old('tel') }}">
        </div>

        {{-- 日付 --}}
        <div class="mb-3">
            <label class="form-label">予約日 *</label>
            <input type="date" class="form-control" name="date" required value="{{ old('date') }}">
        </div>

        {{-- 時間 --}}
        <div class="mb-3">
            <label class="form-label">時間 *</label>
            <select name="time" class="form-select" required>
                <option value="">選択してください</option>
                @foreach (['10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'] as $time)
                    <option value="{{ $time }}" @selected(old('time') == $time)>
                        {{ $time }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- コース --}}
        <div class="mb-3">
            <label class="form-label">コース *</label>
            <select name="course_id" class="form-select" required>
                <option value="">選択してください</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">
                        {{ $course->name }}（{{ $course->duration }}分）
                    </option>
                @endforeach
            </select>
        </div>

        {{-- オプション --}}
        @if($options->count())
            <div class="mb-3">
                <label class="form-label">追加オプション</label><br>
                @foreach ($options as $op)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="options[]" value="{{ $op->id }}">
                        <label>{{ $op->name }}（+{{ number_format($op->price) }}円）</label>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- メモ --}}
        <div class="mb-3">
            <label class="form-label">ご要望・メッセージ（任意）</label>
            <textarea class="form-control" name="notes" rows="4">{{ old('notes') }}</textarea>
        </div>

        <div class="text-center">
            <button class="btn btn-dark px-5 py-2">確認画面へ</button>
        </div>

    </form>
</div>
@endsection
