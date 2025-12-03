<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Sale;
use Illuminate\Http\Request;

class AdminSalesController extends Controller
{
    public function index()
    {
        // 予約売上
        $bookingSales = Booking::where('status', 'done')
            ->orderBy('date', 'desc')
            ->get();

        // 物販売上
        $itemSales = Sale::orderBy('date', 'desc')->get();

        $total = $bookingSales->sum('price') + $itemSales->sum('amount');

        return view('admin.sales.index', compact('bookingSales', 'itemSales', 'total'));
    }

    /**
     * Excel ダウンロード
     */
    public function export()
    {
        return \Excel::download(new \App\Exports\SalesExport, 'sales.xlsx');
    }
}
