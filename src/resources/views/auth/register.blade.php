@extends("layouts.app")

@section("content")

<div class="auth-card card-salon">
    <h2 class="text-center fw-bold mb-4">会員登録</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="/register" method="POST">
        @csrf

        <div class="mb-4">
            <label class="form-label">お名前</label>
            <input type="text" class="form-control form-control-lg" name="name" value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label class="form-label">メールアドレス</label>
            <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label class="form-label">パスワード</label>
            <input type="password" class="form-control form-control-lg" name="password">
        </div>

        <div class="mb-4">
            <label class="form-label">確認用パスワード</label>
            <input type="password" class="form-control form-control-lg" name="password_confirmation">
        </div>

        <button class="btn btn-brand btn-lg w-100">登録</button>
    </form>

    <div class="text-center mt-3">
        <a href="/login">すでに登録済みの方はこちら</a>
    </div>
</div>

@endsection
