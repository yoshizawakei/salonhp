@extends("layouts.app")

@section("content")
    <div class="container" style="max-width:700px;">

        <h2 class="text-center fw-bold mb-4">予約内容確認</h2>

        <table class="table table-bordered bg-white">
            @foreach ($inputs as $key => $value)
                @if(is_array($value)) @continue @endif
                <tr>
                    <th class="bg-light" width="30%">{{ $key }}</th>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
        </table>

        <div class="text-center mt-4 d-flex justify-content-between">

            {{-- 戻る --}}
            <form action="{{ route('booking.index') }}" method="GET">
                <button class="btn btn-outline-secondary">修正する</button>
            </form>

            {{-- 送信 --}}
            <form action="{{ route('booking.send') }}" method="POST">
                @csrf
                @foreach ($inputs as $key => $value)
                    @if(is_array($value))
                        @foreach($value as $v)
                            <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach

                <button class="btn btn-dark px-4">予約を確定する</button>
            </form>

        </div>
    </div>
@endsection