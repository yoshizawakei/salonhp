<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminCourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('category')->orderBy('duration')->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'duration' => 'required|integer',
            'price' => 'required|integer',
        ]);

        Course::create($request->all());

        return redirect('/admin/courses')->with('success', 'コースを追加しました');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);

        $course->update([
            'name' => $request->name,
            'category' => $request->category,
            'duration' => $request->duration,
            'price' => $request->price,
            'is_option' => $request->is_option ?? false,
            'is_active' => $request->is_active ?? false,
            'description' => $request->description,
        ]);

        return redirect('/admin/courses')->with('success', 'コースを更新しました');
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();
        return redirect('/admin/courses')->with('success', 'コースを削除しました');
    }
}
