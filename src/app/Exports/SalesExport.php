<?php

namespace App\Exports;

use App\Models\Booking;
use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class SalesExport implements FromCollection, WithHeadings
{
    /**
     * Excel に出力するデータ
     */
    public function collection()
    {
        // 来店済み予約の売上
        $bookingSales = Booking::where('status', 'done')
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

        // 物販売上
        $itemSales = Sale::orderBy('date', 'desc')
            ->get()
            ->map(function ($s) {
                return [
                    'date' => $s->date,
                    'time' => '',
                    'name' => $s->customer_name ?? '',
                    'item' => $s->item,
                    'duration' => '',
                    'amount' => $s->amount,
                    'type' => '物販',
                ];
            });

        // 予約 + 物販 を統合
        return (new Collection())->concat($bookingSales)->concat($itemSales);
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
