<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalesExport implements FromCollection, WithHeadings
{
    /**
     * Excel に出力するデータ
     */
    public function collection()
    {
        // 来店済み予約の売上
        return Booking::where('status', 'done')
            ->orderBy('date', 'desc')
            ->get()
            ->map(function ($b) {
                return [
                    'date' => $b->date,
                    'time' => $b->time,
                    'name' => $b->name,
                    'item' => $b->course,
                    'duration' => $b->duration,
                    'amount' => $b->price,
                    'type' => '施術',
                ];
            });
    }

    /**
     * Excel のヘッダー
     */
    public function headings(): array
    {
        return [
            '日付',
            '時間',
            '名前',
            '商品/コース',
            '施術時間',
            '金額',
            '区分',
        ];
    }
}
