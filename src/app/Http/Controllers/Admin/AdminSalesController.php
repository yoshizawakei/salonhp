<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;

class AdminSalesController extends Controller
{
    public function index()
    {
        // 月別売上
        $monthlySales = Booking::selectRaw("DATE_FORMAT(date, '%Y-%m') as month, SUM(price) as total")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // 月別来店数
        $monthlyVisits = Booking::selectRaw("DATE_FORMAT(date, '%Y-%m') as month, COUNT(*) as count")
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // コース別売上（course_id 正規化版）
        $courseSales = Booking::selectRaw("course_id, SUM(price) as total")
            ->whereNotNull('course_id')
            ->groupBy('course_id')
            ->with('course:id,name')
            ->get();

        return view('admin.sales.index', compact('monthlySales', 'monthlyVisits', 'courseSales'));
    }

    // Excel エクスポート
    public function export()
    {
        return (new \App\Exports\SalesExport)->download('sales.xlsx');
    }
}
