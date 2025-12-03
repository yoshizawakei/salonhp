<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        // 「戻る」から来た場合、old に値を再セット
        $old = $request->all();
        return view('contact.index')->with($old);
    }

    public function confirm(Request $request)
    {
        $inputs = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'tel' => ['nullable', 'string', 'max:50'],
            'type' => ['nullable', 'string', 'max:100'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        return view('contact.confirm', ['inputs' => $inputs]);
    }

    public function send(Request $request)
    {
        $inputs = $request->all();

        // 本来はここでメール送信やDB保存を行う
        // Mail::to(config('mail.from.address'))->send(new ContactMail($inputs));

        $request->session()->regenerateToken();

        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }
}
