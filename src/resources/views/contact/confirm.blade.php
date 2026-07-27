@extends("layouts.app")

@section("content")
    <div class="container" style="max-width:700px;">

        <h2 class="text-center fw-bold mb-4">確認</h2>

        <table class="table table-bordered bg-white">
            <tr>
                <th class="bg-light">お名前</th>
                <td>{{ $inputs['name'] }}</td>
            </tr>
            <tr>
                <th class="bg-light">メール</th>
                <td>{{ $inputs['email'] }}</td>
            </tr>
            <tr>
                <th class="bg-light">内容</th>
                <td>{{ nl2br(e($inputs['message'])) }}</td>
            </tr>
        </table>

        <div class="d-flex justify-content-between mt-4">

            {{-- 戻る：入力値を保持 --}}
            <form action="{{ route('contact.index') }}" method="GET">
                @foreach($inputs as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <button class="btn btn-outline-secondary">修正する</button>
            </form>

            {{-- 送信 --}}
            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                @foreach($inputs as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                @endforeach
                <button class="btn btn-dark">送信する</button>
            </form>

        </div>
    </div>
@endsection