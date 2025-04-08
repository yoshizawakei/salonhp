@extends("layouts.app")

@section("css")
<link rel="stylesheet" href="{{ asset("css/booking.css") }}">
@endsection

@section("content")
<div class="booking-form__content">
    <div class="booking-form__heading">
        <h2>サロン予約</h2>
    </div>
    <form action="#" method="POST" class="form">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">日付</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="date" name="date" value="{{ old("date") }}">
                </div>
                <div class="form__error">
                    @error("date")
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">時間</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <select name="time">
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                    </select>
                </div>
                <div class="form__error">
                    @error("time")
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">コース</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <select name="course">
                        <option value="アロママッサージ">アロママッサージ</option>
                        <option value="フェイシャルエステ">フェイシャルエステ</option>
                        <option value="ヘッドスパ">ヘッドスパ</option>
                    </select>
                </div>
                <div class="form__error">
                    @error("course")
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__button">
            <button type="submit" class="button">予約</button>
        </div>
    </form>
</div>
@endsection