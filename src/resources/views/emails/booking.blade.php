<p>{{ $inputs['name'] }} 様</p>

<p>この度は Private Salon Varjo のご予約をいただき、誠にありがとうございます。</p>

<p>以下の内容でご予約を承りました。</p>

<hr>

<p><strong>ご予約日：</strong> {{ $inputs['date'] }}</p>
<p><strong>開始時間：</strong> {{ $inputs['time'] }}</p>
<p><strong>コース：</strong> {{ $inputs['course'] }}</p>
<p><strong>施術時間：</strong> {{ $inputs['duration'] }} 分</p>

@if (!empty($inputs['notes']))
    <p><strong>ご要望：</strong><br>{!! nl2br(e($inputs['notes'])) !!}</p>
@endif

<hr>

<p>当日はお気をつけてお越しくださいませ。</p>
<p>ご不明点がございましたら、このメールに返信してお問い合わせいただけます。</p>

<p>Private Salon Varjo</p>