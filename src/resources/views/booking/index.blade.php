@extends("layouts.app")

@section("css")
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endsection

@section("content")
    <div class="container py-5">
        <h2 class="text-center mb-4 fw-bold">ご予約フォーム</h2>

        <div class="row justify-content-center">
            <div class="col-md-7">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        入力内容に誤りがあります。ご確認ください。
                    </div>
                @endif

                <form action="{{ route('booking.confirm') }}" method="POST" class="card shadow-sm p-4 bg-white rounded">
                    @csrf

                    {{-- お名前 --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">お名前</label>
                        <input type="text" name="name" value="{{ old('name', request('name')) }}" class="form-control">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- メール --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">メールアドレス</label>
                        <input type="email" name="email" value="{{ old('email', request('email')) }}" class="form-control">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- 電話 --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">電話番号</label>
                        <input type="text" name="tel" value="{{ old('tel', request('tel')) }}" class="form-control">
                        @error('tel') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- 日付 --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">日付</label>
                        <input type="date" name="date" value="{{ old('date', request('date')) }}" class="form-control">
                        @error('date') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- 時間 --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">時間</label>
                        <select name="time" class="form-select">
                            <option selected disabled>選択してください</option>
                            @foreach (['10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00'] as $t)
                                <option value="{{ $t }}" {{ old('time', request('time')) == $t ? 'selected' : '' }}>
                                    {{ $t }}
                                </option>
                            @endforeach
                        </select>
                        @error('time') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- コース（マスターデータ） --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">コース内容</label>
                        <select name="course_id" class="form-select" id="courseSelect">
                            <option selected disabled>選択してください</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}" data-duration="{{ $course->duration }}"
                                    data-price="{{ $course->price }}" {{ old('course_id', request('course_id')) == $course->id ? 'selected' : '' }}>
                                    {{ $course->name }}（{{ $course->duration }}分 ¥{{ number_format($course->price) }}）
                                </option>
                            @endforeach
                        </select>
                        @error('course_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    @if ($options->count())
                        {{-- 追加オプション --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">追加オプション（複数選択可）</label>
                            @php $selectedOptions = old('options', request('options', [])); @endphp
                            @foreach ($options as $option)
                                <div class="form-check">
                                    <input type="checkbox" name="options[]" value="{{ $option->id }}"
                                        class="form-check-input option-checkbox"
                                        data-duration="{{ $option->duration }}" data-price="{{ $option->price }}"
                                        id="option{{ $option->id }}"
                                        {{ in_array($option->id, $selectedOptions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="option{{ $option->id }}">
                                        {{ $option->name }}（+{{ $option->duration }}分 / +¥{{ number_format($option->price) }}）
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    {{-- 表示用（◯分 / ◯円） --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">施術時間</label>
                        <input type="text" id="duration_display" readonly class="form-control bg-light"
                            value="{{ old('duration') ? old('duration') . '分' : '' }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">料金</label>
                        <input type="text" id="price_display" readonly class="form-control bg-light"
                            value="{{ old('price') ? old('price') . '円' : '' }}">
                    </div>

                    {{-- hidden：値として送る --}}
                    <input type="hidden" name="duration" id="duration" value="{{ old('duration', request('duration')) }}">
                    <input type="hidden" name="price" id="price" value="{{ old('price', request('price')) }}">

                    {{-- 備考 --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">ご要望・お身体のお悩みなど</label>
                        <textarea name="notes" rows="4" class="form-control">{{ old('notes', request('notes')) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 rounded-pill mt-3 py-2 fw-bold">
                        内容確認へ進む
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- JS：コース変更時に表示エリアと hidden を更新 --}}
    <script>
        const courseSelect = document.getElementById('courseSelect');
        const durationInput = document.getElementById('duration');
        const priceInput = document.getElementById('price');
        const optionCheckboxes = document.querySelectorAll('.option-checkbox');

        const durationDisplay = document.getElementById('duration_display');
        const priceDisplay = document.getElementById('price_display');

        function updateCourseValues() {
            const opt = courseSelect.options[courseSelect.selectedIndex];
            let duration = Number(opt.dataset.duration) || 0;
            let price = Number(opt.dataset.price) || 0;

            optionCheckboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    duration += Number(checkbox.dataset.duration) || 0;
                    price += Number(checkbox.dataset.price) || 0;
                }
            });

            durationInput.value = duration || '';
            priceInput.value = price || '';

            durationDisplay.value = duration ? duration + '分' : '';
            priceDisplay.value = price ? price + '円' : '';
        }

        if (courseSelect) {
            courseSelect.addEventListener('change', updateCourseValues);

            optionCheckboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', updateCourseValues);
            });

            // old() に値がある場合、ロード時に反映
            if (courseSelect.value) {
                updateCourseValues();
            }
        }
    </script>
@endsection