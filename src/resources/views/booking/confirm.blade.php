@extends("layouts.app")

@section("content")
    <div class="container" style="max-width:700px;">

        <h2 class="text-center fw-bold mb-4">予約内容確認</h2>

        <table class="table table-bordered bg-white">

            <tr>
                <th class="bg-light">お名前</th>
                <td>{{ $inputs['name'] }}</td>
            </tr>

            <tr>
                <th class="bg-light">メールアドレス</th>
                <td>{{ $inputs['email'] }}</td>
            </tr>

            <tr>
                <th class="bg-light">電話番号</th>
                <td>{{ $inputs['tel'] }}</td>
            </tr>

            <tr>
                <th class="bg-light">日付</th>
                <td>{{ $inputs['date'] }}</td>
            </tr>

            <tr>
                <th class="bg-light">時間</th>
                <td>{{ $inputs['time'] }}</td>
            </tr>

            <tr>
                <th class="bg-light">コース</th>
                <td>{{ $inputs['course'] }}</td>
            </tr>

            <tr>
                <th class="bg-light">追加オプション</th>
                <td>{{ $inputs['option_names'] ?: 'なし' }}</td>
            </tr>

            <tr>
                <th class="bg-light">施術時間</th>
                <td>{{ $inputs['duration'] }} 分</td>
            </tr>

            <tr>
                <th class="bg-light">料金</th>
                <td>¥{{ number_format($inputs['price']) }}</td>
            </tr>

            <tr>
                <th class="bg-light">備考</th>
                <td>{{ $inputs['notes'] ?? '（なし）' }}</td>
            </tr>

        </table>

        <div class="d-flex justify-content-between mt-4">

            {{-- 戻る：入力値を保持 --}}
            <form action="{{ route('booking.index') }}" method="GET">
                @foreach($inputs as $key => $value)
                    @if (is_array($value))
                        @foreach ($value as $v)
                            <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <button class="btn btn-outline-secondary">修正する</button>
            </form>

            {{-- 確定 --}}
            <form action="{{ route('booking.send') }}" method="POST">
                @csrf
                @foreach($inputs as $key => $value)
                    @if (is_array($value))
                        @foreach ($value as $v)
                            <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <button class="btn btn-dark">予約を確定する</button>
            </form>

        </div>
    </div>
@endsection