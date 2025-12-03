<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100',
            'body' => 'required|string',
        ]);

        News::create([
            'title' => $request->title,
            'body' => $request->body,
            'published' => $request->published ? true : false,
        ]);

        return redirect('/admin/news')->with('success', 'お知らせを投稿しました');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $news->update([
            'title' => $request->title,
            'body' => $request->body,
            'published' => $request->published ? true : false,
        ]);

        return redirect('/admin/news')->with('success', 'お知らせを更新しました');
    }

    public function destroy($id)
    {
        News::findOrFail($id)->delete();
        return redirect('/admin/news')->with('success', '削除しました');
    }
}
