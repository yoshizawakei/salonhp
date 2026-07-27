<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'course_id',
        'name',
        'email',
        'tel',
        'date',
        'time',
        'course',   // 表示用に文字列も保持
        'options',  // 選択した追加オプション名（表示用）
        'duration',
        'price',
        'notes',
        'status',
    ];

    // 顧客
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // コース
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
