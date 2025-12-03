<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactNotification;

class ContactController extends Controller
{
    /**
     * お問い合わせフォーム
     */
    public function index()
    {
        return view("contact.index");
    }

    /**
     * 確認画面
     */
    public function confirm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'message' => 'required|string|max:1000'
        ]);

        $inputs = $request->all();

        return view("contact.confirm", compact("inputs"));
    }

    /**
     * 送信処理
     */
    public function send(Request $request)
    {
        $inputs = $request->all();

        // メール送信（お客様へ）
        Mail::to($inputs['email'])->send(new ContactNotification($inputs));

        // 管理者にも送る場合
        Mail::to("admin@example.com")->send(new ContactNotification($inputs));

        return redirect()->route('contact.thanks');
    }

    /**
     * 完了画面
     */
    public function thanks()
    {
        return view("contact.thanks");
    }
}
