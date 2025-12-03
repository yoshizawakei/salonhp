<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Booking;
// use App\Models\Contact;
// use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // 実装例（モデルができたらコメント解除）
        // $todayBookings   = Booking::whereDate('date', today())->count();
        // $pendingContacts = Contact::where('status', 'pending')->count();
        // $userCount       = User::count();
        // $latestBookings  = Booking::latest()->limit(5)->get();

        $todayBookings = 0;
        $pendingContacts = 0;
        $userCount = 0;
        $latestBookings = [];

        return view('admin.dashboard', compact(
            'todayBookings',
            'pendingContacts',
            'userCount',
            'latestBookings'
        ));
    }

    public function bookingsIndex()
    {
        // $bookings = Booking::latest()->paginate(20);
        $bookings = [];
        return view('admin.bookings.index', compact('bookings'));
    }

    public function contactsIndex()
    {
        // $contacts = Contact::latest()->paginate(20);
        $contacts = [];
        return view('admin.contacts.index', compact('contacts'));
    }

    public function usersIndex()
    {
        // $users = User::latest()->paginate(20);
        $users = [];
        return view('admin.users.index', compact('users'));
    }
}
