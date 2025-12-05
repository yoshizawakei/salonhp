<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * 公開中のお知らせ一覧
     */
    public function index()
    {
        $news = News::where('published', true)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('news.index', compact('news'));
    }

    /**
     * 詳細
     */
    public function show($id)
    {
        $news = News::where('published', true)->findOrFail($id);

        return view('news.show', compact('news'));
    }
}
