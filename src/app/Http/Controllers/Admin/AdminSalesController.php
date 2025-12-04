<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Course;
use Carbon\Carbon;
use Illuminate\Http\Request;

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

        // コース別売上
        $courseSales = Booking::selectRaw("course_id, SUM(price) as total")
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
