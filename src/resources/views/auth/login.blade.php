@extends("layouts.app")

@section("content")

<div class="auth-card card-salon">
    <h2 class="text-center fw-bold mb-4">ログイン</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <div>{{ $error }}</div>
            @endforeach
        </div>
    @endif

    <form action="/login" method="POST">
        @csrf

        <div class="mb-4">
            <label class="form-label">メールアドレス</label>
            <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}">
        </div>

        <div class="mb-4">
            <label class="form-label">パスワード</label>
            <input type="password" class="form-control form-control-lg" name="password">
        </div>

        <button class="btn btn-brand btn-lg w-100">ログイン</button>
    </form>

    <div class="text-center mt-4">
        <a href="/register">新規登録はこちら</a>
    </div>
</div>

@endsection
