<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use App\Models\Sale;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = Carbon::today();

        return view('admin.dashboard', [
            'todayBookings' => Booking::where('date', $today)->count(),
            'pending' => Booking::where('status', 'pending')->count(),
            'monthlySales' => Booking::whereMonth('date', now()->month)->sum('price'),
            'users' => User::count(),
            'latestBookings' => Booking::orderBy('date', 'desc')->limit(5)->get(),
        ]);
    }
}
