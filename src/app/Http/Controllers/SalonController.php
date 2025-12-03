<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CustomerReservationMail;
use App\Mail\AdminReservationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;


class SalonController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function login()
    {
        return view("auth.login");
    }

    public function booking()
    {
        return view("booking");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect("/");
    }

    public function store(Request $request)
    {
        $booking = Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'date' => $request->date,
            'time' => $request->time,
            'course' => $request->course,
            'duration' => $request->duration,
            'price' => $request->price,
            'status' => 'pending',
        ]);

        // お客様へ
        Mail::to($booking->email)->send(new CustomerReservationMail($booking));

        // 管理者へ
        Mail::to(env('ADMIN_MAIL'))->send(new AdminReservationMail($booking));

        return redirect('/booking/thanks');
    }
}
