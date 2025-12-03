@extends("layouts.app")

@section("css")
<style>
    .booking-wrapper {
        max-width: 650px;
        margin: 50px auto;
        padding: 40px;
        background: #fff;
        border-radius: 14px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    }
</style>
@endsection

@section("content")
<div class="container">
    <div class="booking-wrapper">
        <h2 class="text-center fw-bold mb-4">サロン予約</h2>

        <form action="#" method="POST">
            @csrf

            <div class="mb-4">
                <label class="form-label">日付</label>
                <input type="date" class="form-control form-control-lg" name="date">
            </div>

            <div class="mb-4">
                <label class="form-label">時間</label>
                <select name="time" class="form-select form-select-lg">
                    @foreach(["10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00"] as $t)
                    <option value="{{ $t }}">{{ $t }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="form-label">コース</label>
                <select name="course" class="form-select form-select-lg">
                    <option value="アロママッサージ">アロママッサージ</option>
                    <option value="フェイシャルエステ">フェイシャルエステ</option>
                    <option value="ヘッドスパ">ヘッドスパ</option>
                </select>
            </div>

            <button class="btn btn-dark btn-lg w-100">予約する</button>
        </form>
    </div>
</div>
@endsection
