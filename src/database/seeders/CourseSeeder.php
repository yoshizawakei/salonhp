<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [

            // --------------------
            // Varjoシグネチャー
            // --------------------
            [
                'name' => 'Varjo シグネチャー 120分',
                'category' => 'signature',
                'duration' => 120,
                'price' => 18000,
                'description' => '全身オイル＋ヘッド＋デコルテの贅沢コース。',
            ],
            [
                'name' => 'Varjo シグネチャー 150分',
                'category' => 'signature',
                'duration' => 150,
                'price' => 22000,
                'description' => '全身＋ヘッド＋フット＋ティータイム付きのご褒美コース。',
            ],

            // --------------------
            // ボディ（アロマ）
            // --------------------
            [
                'name' => 'アロマボディ 60分',
                'category' => 'body',
                'duration' => 60,
                'price' => 11000,
                'description' => '背面中心のショートコース。',
            ],
            [
                'name' => 'アロマボディ 90分',
                'category' => 'body',
                'duration' => 90,
                'price' => 14000,
                'description' => '初めての方に人気のスタンダードコース。',
            ],
            [
                'name' => 'アロマボディ 120分',
                'category' => 'body',
                'duration' => 120,
                'price' => 17000,
                'description' => '全身をじっくりと整えるロングコース。',
            ],

            // --------------------
            // ヘッド
            // --------------------
            [
                'name' => 'ドライヘッドスパ 45分',
                'category' => 'head',
                'duration' => 45,
                'price' => 7000,
                'description' => '頭・首・肩を集中的にケア。',
            ],
            [
                'name' => 'ドライヘッドスパ 60分',
                'category' => 'head',
                'duration' => 60,
                'price' => 9000,
                'description' => 'デコルテまでゆっくり整えるコース。',
            ],

            // --------------------
            // フット
            // --------------------
            [
                'name' => 'リフレクソロジー 45分',
                'category' => 'foot',
                'duration' => 45,
                'price' => 6500,
                'description' => '足裏〜ふくらはぎのケア。',
            ],
            [
                'name' => 'レッグスリム 60分',
                'category' => 'foot',
                'duration' => 60,
                'price' => 8500,
                'description' => 'ふくらはぎ〜太もも集中ケア。',
            ],

            // --------------------
            // フェイシャル
            // --------------------
            [
                'name' => 'フェイシャルベーシック 60分',
                'category' => 'facial',
                'duration' => 60,
                'price' => 10000,
                'description' => '美肌ケアの基本コース。',
            ],
            [
                'name' => 'フェイシャル＆デコルテ 90分',
                'category' => 'facial',
                'duration' => 90,
                'price' => 14000,
                'description' => 'フェイシャル＋デコルテでご褒美ケア。',
            ],

            // --------------------
            // オプション
            // --------------------
            [
                'name' => '延長15分',
                'category' => 'option',
                'duration' => 15,
                'price' => 2000,
                'is_option' => true,
                'description' => 'もう少し受けたいときに。',
            ],
            [
                'name' => 'ヘッドケア追加（15分）',
                'category' => 'option',
                'duration' => 15,
                'price' => 2500,
                'is_option' => true,
                'description' => 'ボディコースにヘッドを追加。',
            ],
            [
                'name' => 'フットケア追加（20分）',
                'category' => 'option',
                'duration' => 20,
                'price' => 3000,
                'is_option' => true,
                'description' => 'ボディコースにフットを追加。',
            ],
            [
                'name' => 'アロマグレードアップ',
                'category' => 'option',
                'duration' => 0,
                'price' => 1500,
                'is_option' => true,
                'description' => '精油を特別ブレンドに変更。',
            ],
        ];

        DB::table('courses')->insert($courses);
    }
}
