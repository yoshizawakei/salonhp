<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Admin;
use App\Models\Course;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // --------------------------
        // 管理者
        // --------------------------
        Admin::create([
            'name' => '管理者',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);

        // --------------------------
        // テストユーザー
        // --------------------------
        User::create([
            'name' => 'テストユーザー',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'tel' => '090-1234-5678',
            'birthday' => '1995-01-01',
            'gender' => 'female',
            'memo' => 'テスト用ユーザーです。',
            'visit_count' => 1,
        ]);

        // --------------------------
        // 施術コース（代表メニュー）
        // --------------------------
        Course::create([
            'name' => 'アロマボディトリートメント',
            'category' => 'body',
            'duration' => 90,
            'price' => 12000,
            'is_option' => false,
            'is_active' => true,
            'description' => '植物由来のアロマオイルを贅沢に使用した全身ケア。深いリラクゼーションへ導きます。',
        ]);

        Course::create([
            'name' => 'フェイシャルエステ',
            'category' => 'facial',
            'duration' => 60,
            'price' => 9000,
            'is_option' => false,
            'is_active' => true,
            'description' => '肌質に合わせたオーダーメイド施術で、透明感とツヤを引き出します。',
        ]);

        Course::create([
            'name' => 'ドライヘッドスパ',
            'category' => 'head',
            'duration' => 45,
            'price' => 6000,
            'is_option' => false,
            'is_active' => true,
            'description' => '頭皮・目元の疲れを集中的にケアし、深いリラックスと快眠をサポートします。',
        ]);

        // --------------------------
        // 追加オプション
        // --------------------------
        Course::create([
            'name' => 'ホットストーン追加',
            'category' => 'option',
            'duration' => 15,
            'price' => 2000,
            'is_option' => true,
            'is_active' => true,
            'description' => '温めた石で筋肉の緊張をやわらげ、より深いリラクゼーションへ。',
        ]);

        Course::create([
            'name' => 'アロマオイル変更（プレミアム）',
            'category' => 'option',
            'duration' => 0,
            'price' => 1000,
            'is_option' => true,
            'is_active' => true,
            'description' => '厳選した上質なアロマオイルへの変更。',
        ]);
    }
}
