@extends("layouts.app")

@section("css")
<link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endsection

@section("content")
<div class="container py-5">
    <h2 class="text-center mb-4 fw-bold">ご予約フォーム</h2>

    <div class="row justify-content-center">
        <div class="col-md-6">

            @if ($errors->any())
                <div class="alert alert-danger">
                    入力内容に誤りがあります。ご確認ください。
                </div>
            @endif

            <form action="/booking" method="POST" class="card shadow-sm p-4 bg-white rounded">
                @csrf

                {{-- お名前 --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">お名前</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- メール --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">メールアドレス</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- 日付 --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">日付</label>
                    <input type="date" name="date" value="{{ old('date') }}" class="form-control">
                    @error('date') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- 時間 --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">時間</label>
                    <select name="time" class="form-select">
                        <option selected disabled>選択してください</option>
                        @foreach (['10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00'] as $t)
                            <option value="{{ $t }}" {{ old('time')==$t ? 'selected':'' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                    @error('time') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- コース --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">コース内容</label>
                    <select name="course" class="form-select" id="courseSelect">
                        <option selected disabled>選択してください</option>
                        <option value="aroma" data-duration="90" data-price="12000"
                            {{ old('course')=='aroma' ? 'selected':'' }}>
                            アロマボディトリートメント（90分 ¥12,000）
                        </option>
                        <option value="facial" data-duration="60" data-price="9000"
                            {{ old('course')=='facial' ? 'selected':'' }}>
                            フェイシャルエステ（60分 ¥9,000）
                        </option>
                        <option value="headspa" data-duration="45" data-price="6000"
                            {{ old('course')=='headspa' ? 'selected':'' }}>
                            ドライヘッドスパ（45分 ¥6,000）
                        </option>
                    </select>
                    @error('course') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                {{-- 所要時間 & 料金（自動入力） --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">施術時間</label>
                    <input type="text" name="duration" id="duration" readonly class="form-control bg-light">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">料金</label>
                    <input type="text" name="price" id="price" readonly class="form-control bg-light">
                </div>

                <button type="submit" class="btn btn-dark w-100 rounded-pill mt-3 py-2 fw-bold">
                    予約を確定する
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    const courseSelect = document.getElementById('courseSelect');
    const durationInput = document.getElementById('duration');
    const priceInput = document.getElementById('price');

    courseSelect.addEventListener('change', function() {
        durationInput.value = this.options[this.selectedIndex].dataset.duration;
        priceInput.value = this.options[this.selectedIndex].dataset.price;
    });
</script>

@endsection
