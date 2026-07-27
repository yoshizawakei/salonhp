<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Salon Information
    |--------------------------------------------------------------------------
    |
    | テンプレートとして配布する際、購入者は .env にこれらの値を設定するだけで
    | サイト全体（公開ページ・管理画面・メール文面）の店舗情報を差し替えられる。
    |
    */

    'name' => env('SALON_NAME', 'Sample Salon'),

    'tagline' => env('SALON_TAGLINE', 'あなただけの隠れ家サロンで、心身を美しく解き放つひととき。'),

    'description' => env('SALON_DESCRIPTION', '完全予約制のプライベートサロン。厳選メニューであなたを癒します。'),

    'tel' => env('SALON_TEL', '03-0000-0000'),

    'address_region' => env('SALON_ADDRESS_REGION', 'Tokyo'),

    'address_locality' => env('SALON_ADDRESS_LOCALITY', '東京都◯◯区◯◯1-2-3'),

    'business_hours' => env('SALON_HOURS', '10:00-20:00'),

    'url' => env('APP_URL', 'https://your-domain.com'),

];
