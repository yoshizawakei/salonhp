<p>{{ $booking->name }} 様</p>

<p>この度は Private Salon Varjo にご予約いただき誠にありがとうございます。</p>

<p>
■ 予約内容<br>
日時：{{ $booking->date }} {{ $booking->time }}<br>
コース：{{ $booking->course }}<br>
施術時間：{{ $booking->duration }}分<br>
料金：{{ number_format($booking->price) }}円<br>
</p>

<p>担当者より改めてご連絡いたします。</p>

<p>--------<br>
Private Salon Varjo<br>
</p>
