<?php

namespace App\Http\Controllers;

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
}
