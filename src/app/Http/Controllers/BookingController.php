<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingNotification;

class BookingController extends Controller
{
    public function index()
    {
        $courses = Course::active()->where('is_option', false)->get();
        $options = Course::active()->where('is_option', true)->get();

        return view('booking.index', compact('courses', 'options'));
    }

    public function confirm(Request $request)
    {
        $inputs = $request->validate([
            'date' => 'required|date',
            'time' => 'required|string',
            'course' => 'required|string',
            'duration' => 'required|integer',
            'notes' => 'nullable|string',

            // ログインなし対応
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:255',
        ]);

        return view('booking.confirm', ['inputs' => $inputs]);
    }

    public function send(Request $request)
    {
        $inputs = $request->all();

        // DB保存
        Booking::create([
            'user_id' => auth()->check() ? auth()->id() : null,
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'tel' => $inputs['tel'] ?? null,
            'date' => $inputs['date'],
            'time' => $inputs['time'],
            'course' => $inputs['course'],
            'duration' => $inputs['duration'],
            'notes' => $inputs['notes'] ?? null,
        ]);

        // メール送信
        Mail::to($inputs['email'])->send(new BookingNotification($inputs));

        return redirect()->route('booking.thanks');
    }

    public function thanks()
    {
        return view('booking.thanks');
    }
}
