@extends("layouts.app")

@section("css")
<link rel="stylesheet" href="{{ asset("css/login.css") }}">
@endsection

@section("content")
<div class="login-form__content">
    <div class="login-form__heading">
        <h2>ログイン</h2>
    </div>
    <form action="/login" method="POST" class="form">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="email" name="email" value="{{ old("email") }}">
                </div>
                <div class="form__error">
                    @error("email")
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">パスワード</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="password" name="password" >
                </div>
                <div class="form__error">
                    @error("password")
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button type="submit" class="button">ログイン</button>
        </div>
    </form>
    <div class="form__link">
        <a href="/register" class="link">新規登録の方はこちら</a>
    </div>
</div>
@endsection