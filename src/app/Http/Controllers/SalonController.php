<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CustomerReservationMail;
use App\Mail\AdminReservationMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Booking;
use App\Models\News;


class SalonController extends Controller
{
    public function index()
    {
        $news = News::latest()->take(5)->get(); // お知らせ5件表示
        return view('index', compact('news'));
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
        return view("booking.index");
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect("/");
    }

    public function bookingStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'date' => 'required|date',
            'time' => 'required',
            'course' => 'required',
            'duration' => 'required|integer',
            'price' => 'required|integer',
        ]);

        $booking = Booking::create($request->all());

        // お客様へメール
        Mail::to($booking->email)->send(new CustomerReservationMail($booking));

        // 管理者へメール
        Mail::to(env('ADMIN_MAIL'))->send(new AdminReservationMail($booking));

        return redirect('/booking/thanks');
    }
}
