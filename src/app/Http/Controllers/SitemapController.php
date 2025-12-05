<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\News;

class SitemapController extends Controller
{
    public function index()
    {
        $urls = [
            url('/'),
            url('/news'),
            url('/booking'),
            url('/contact'),
        ];

        // NEWS の個別ページ
        $newsItems = News::orderBy('updated_at', 'desc')->get();

        return response()
            ->view('sitemap', compact('urls', 'newsItems'))
            ->header('Content-Type', 'application/xml');
    }
}
