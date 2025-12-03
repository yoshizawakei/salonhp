@extends("layouts.app")

@section("content")
    <div class="container" style="max-width:700px;">

        <h2 class="text-center fw-bold mb-4">お問い合わせ</h2>

        <form action="{{ route('contact.confirm') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">お名前 *</label>
                <input type="text" class="form-control" name="name" required value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">メールアドレス *</label>
                <input type="email" class="form-control" name="email" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label class="form-label">お問い合わせ内容 *</label>
                <textarea name="message" class="form-control" rows="5" required>{{ old('message') }}</textarea>
            </div>

            <div class="text-center">
                <button class="btn btn-dark px-5">確認へ</button>
            </div>

        </form>

    </div>
@endsection