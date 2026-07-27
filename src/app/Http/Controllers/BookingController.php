<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Booking;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingNotification;
use App\Mail\AdminReservationMail;

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
     * 予約フォームの共通バリデーションルール
     */
    private function rules(): array
    {
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'tel' => 'nullable|string|max:20',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|string',
            'course_id' => 'required|exists:courses,id',
            'options' => 'nullable|array',
            'options.*' => 'exists:courses,id',
            'notes' => 'nullable|string|max:500',
        ];
    }

    /**
     * 選択されたオプションコースの名前・合計金額・合計時間
     */
    private function summarizeOptions(array $optionIds): array
    {
        $optionCourses = Course::whereIn('id', $optionIds)->get();

        return [
            $optionCourses->pluck('name')->implode('、'),
            $optionCourses->sum('price'),
            $optionCourses->sum('duration'),
        ];
    }

    /**
     * 予約内容確認画面
     */
    public function confirm(Request $request)
    {
        $request->validate($this->rules());

        $inputs = $request->all();

        $course = Course::findOrFail($inputs['course_id']);

        [$optionNames, $optionPrice, $optionDuration] = $this->summarizeOptions($inputs['options'] ?? []);

        // コース名（テーブルの "course" に保存される名前）
        $inputs['course'] = $course->name;
        $inputs['option_names'] = $optionNames;

        // 合計
        $inputs['duration'] = $course->duration + $optionDuration;
        $inputs['price'] = $course->price + $optionPrice;

        return view('booking.confirm', compact('inputs'));
    }

    /**
     * 予約確定
     */
    public function send(Request $request)
    {
        $request->validate($this->rules());

        $inputs = $request->all();

        $course = Course::findOrFail($inputs['course_id']);

        [$optionNames, $optionPrice, $optionDuration] = $this->summarizeOptions($inputs['options'] ?? []);

        // 合計
        $total_price = $course->price + $optionPrice;
        $total_duration = $course->duration + $optionDuration;

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
            'options' => $optionNames !== '' ? $optionNames : null,
            'duration' => $total_duration,
            'price' => $total_price,
            'notes' => $inputs['notes'] ?? null,
        ]);

        // メール送信（お客様へ確認メール、管理者へ新規予約通知）
        Mail::to($booking->email)->send(new BookingNotification($booking));
        Mail::to(config('mail.admin_address'))->send(new AdminReservationMail($booking));

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
