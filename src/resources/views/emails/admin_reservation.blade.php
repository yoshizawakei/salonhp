@component('mail::message')
# 【新規予約】予約が入りました

以下の内容で予約が入りました。

@component('mail::panel')
**名前**：{{ $booking->name }}  
**日付**：{{ $booking->date }}  
**時間**：{{ $booking->time }}  
**コース**：{{ $booking->course }}  
**時間**：{{ $booking->duration }} 分  
**料金**：¥{{ number_format($booking->price) }}  
@endcomponent

@component('mail::button', ['url' => url('/admin/bookings')])
管理画面で確認
@endcomponent

@endcomponent
