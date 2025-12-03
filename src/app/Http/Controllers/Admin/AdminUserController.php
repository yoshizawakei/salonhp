<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $bookings = Booking::where('user_id', $id)->orderBy('date', 'desc')->get();

        return view('admin.users.show', compact('user', 'bookings'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'tel' => $request->tel,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'memo' => $request->memo,
            'allergy' => $request->allergy,
            'history' => $request->history,
        ]);

        return redirect("/admin/users/{$id}")
            ->with('success', 'カルテを更新しました');
    }
}
