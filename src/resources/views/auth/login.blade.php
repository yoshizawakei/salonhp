@extends("layouts.app")

@section("css")
<style>
    .auth-wrapper {
        max-width: 450px;
        margin: 60px auto;
        padding: 40px;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
</style>
@endsection

@section("content")

<div class="auth-wrapper">
    <h2 class="text-center fw-bold mb-4">ログイン</h2>

    <form action="/login" method="POST">
        @csrf

        <div class="mb-4">
            <label class="form-label">メールアドレス</label>
            <input type="email" class="form-control form-control-lg" name="email">
        </div>

        <div class="mb-4">
            <label class="form-label">パスワード</label>
            <input type="password" class="form-control form-control-lg" name="password">
        </div>

        <button class="btn btn-dark btn-lg w-100">ログイン</button>
    </form>

    <div class="text-center mt-4">
        <a href="/register" class="text-dark">新規登録はこちら</a>
    </div>
</div>

@endsection
