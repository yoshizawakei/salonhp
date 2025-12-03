<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingNotification;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * 予約フォーム：表示
     */
    public function index()
    {
        // メインコース
        $courses = Course::where('is_option', false)
            ->where('is_active', true)
            ->orderBy('category')
            ->orderBy('duration')
            ->get();

        // オプション
        $options = Course::where('is_option', true)
            ->where('is_active', true)
            ->get();

        return view("booking.index", compact("courses", "options"));
    }

    /**
     * 予約内容：確認画面
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

        // メインコース
        $course = Course::findOrFail($inputs['course_id']);

        // オプション
        $option_price = 0;
        $option_duration = 0;

        if (!empty($inputs['options'])) {
            $options = Course::whereIn('id', $inputs['options'])->get();
            $option_price = $options->sum('price');
            $option_duration = $options->sum('duration');
        }

        // 合計計算
        $inputs['course_name'] = $course->name;
        $inputs['duration'] = $course->duration + $option_duration;
        $inputs['price'] = $course->price + $option_price;

        return view('booking.confirm', compact('inputs'));
    }

    /**
     * 予約の確定処理（DB保存＋メール送信）
     */
    public function send(Request $request)
    {
        $inputs = $request->all();

        // メインコース
        $course = Course::findOrFail($inputs['course_id']);

        // オプション計算
        $option_price = 0;
        $option_duration = 0;

        if (!empty($inputs['options'])) {
            $options = Course::whereIn('id', $inputs['options'])->get();
            $option_price = $options->sum('price');
            $option_duration = $options->sum('duration');
        }

        $total_price = $course->price + $option_price;
        $total_duration = $course->duration + $option_duration;

        // DB保存
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'tel' => $inputs['tel'],
            'date' => $inputs['date'],
            'time' => $inputs['time'],
            'course' => $course->name,
            'duration' => $total_duration,
            'price' => $total_price,
            'notes' => $inputs['notes'] ?? null,
        ]);

        // メール送信（お客様）
        Mail::to($inputs['email'])->send(new BookingNotification($booking));

        // メール送信（管理者にも通知したい場合）
        Mail::to("your_admin_mail@example.com")->send(new BookingNotification($booking));

        return redirect()->route('booking.thanks');
    }

    /**
     * 完了ページ
     */
    public function thanks()
    {
        return view('booking.thanks');
    }
}
