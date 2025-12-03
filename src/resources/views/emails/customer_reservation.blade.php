@component('mail::message')
# ご予約ありがとうございます

{{ $booking->name }} 様
この度は **Varjo** をご予約いただき、誠にありがとうございます。

---

## ご予約内容

@component('mail::panel')
**日時**：{{ $booking->date }} {{ $booking->time }}
**コース**：{{ $booking->course }}
**所要時間**：{{ $booking->duration }} 分
**料金**：¥{{ number_format($booking->price) }}
@endcomponent

---

当日はお気をつけてお越しください。
スタッフ一同、心よりお待ち申し上げます。

## Varjo
東京都〇〇区〇〇 1-2-3
営業時間：10:00〜20:00
TEL：03-xxxx-xxxx

@endcomponent