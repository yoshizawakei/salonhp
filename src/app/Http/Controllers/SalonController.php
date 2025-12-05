<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class SalonController extends Controller
{
    public function index()
    {
        // 公開中のお知らせ最新5件
        $news = News::where('published', true)
            ->latest()
            ->take(5)
            ->get();

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

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/");
    }
}
