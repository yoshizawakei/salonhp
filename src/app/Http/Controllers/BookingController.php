<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingNotification;

class BookingController extends Controller
{
    /**
     * 予約フォーム
     */
    public function index()
    {
        $courses = Course::where('is_option', false)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('duration')
            ->get();

        $options = Course::where('is_option', true)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        return view("booking.index", compact("courses", "options"));
    }

    /**
     * 予約内容確認画面
     */
    public function confirm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'tel' => 'nullable|string|max:20',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'options' => 'array',
            'notes' => 'nullable|string|max:500',
        ]);

        $inputs = $request->all();

        $course = Course::findOrFail($inputs['course_id']);

        // オプション
        $option_price = 0;
        $option_duration = 0;

        if (!empty($inputs['options'])) {
            $optionCourses = Course::whereIn('id', $inputs['options'])->get();
            $option_price = $optionCourses->sum('price');
            $option_duration = $optionCourses->sum('duration');
        }

        // コース名（テーブルの "course" に保存される名前）
        $inputs['course'] = $course->name;

        // 合計
        $inputs['duration'] = $course->duration + $option_duration;
        $inputs['price'] = $course->price + $option_price;

        return view('booking.confirm', compact('inputs'));
    }

    /**
     * 予約確定
     */
    public function send(Request $request)
    {
        $inputs = $request->all();

        $course = Course::findOrFail($inputs['course_id']);

        // オプション
        $option_price = 0;
        $option_duration = 0;

        if (!empty($inputs['options'])) {
            $optionCourses = Course::whereIn('id', $inputs['options'])->get();
            $option_price = $optionCourses->sum('price');
            $option_duration = $optionCourses->sum('duration');
        }

        // 合計
        $total_price = $course->price + $option_price;
        $total_duration = $course->duration + $option_duration;

        // DB 保存
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'course_id' => $course->id,
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'tel' => $inputs['tel'] ?? null,
            'date' => $inputs['date'],
            'time' => $inputs['time'],
            'course' => $course->name, // ← テーブルと同期
            'duration' => $total_duration,
            'price' => $total_price,
            'notes' => $inputs['notes'] ?? null,
        ]);

        // メール送信
        Mail::to($booking->email)->send(new BookingNotification($booking));
        Mail::to(config('mail.from.address'))->send(new BookingNotification($booking));

        return redirect()->route('booking.thanks');
    }

    /**
     * 完了画面
     */
    public function thanks()
    {
        return view('booking.thanks');
    }
}
