<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $today = Carbon::today();

        $todayBookings = Booking::whereDate('date', $today)->count();
        $todaySales = Booking::whereDate('date', $today)->sum('price');
        $newUsers = User::whereDate('created_at', $today)->count();

        return view('admin.dashboard', compact(
            'todayBookings',
            'todaySales',
            'newUsers'
        ));
    }
}
