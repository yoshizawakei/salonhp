<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::orderBy('date', 'desc')->orderBy('time');

        if ($request->date) {
            $query->where('date', $request->date);
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }
        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        $bookings = $query->paginate(20);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        $booking->update([
            'status' => $request->status,
            'notes' => $request->notes,
            'price' => $request->price,
        ]);

        return redirect('/admin/bookings')->with('success', '予約を更新しました');
    }

    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();

        return redirect('/admin/bookings')->with('success', '削除しました');
    }
}
