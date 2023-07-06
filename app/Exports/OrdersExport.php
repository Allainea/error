<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class OrdersExport implements FromCollection, WithHeadings, WithTitle, ShouldAutoSize
{
    use Exportable;

    public function collection()
    {
        $orders = Order::whereHas('payments')->get();

        $data = [];

        foreach ($orders as $order) {
            $row = [
                'ID' => $order->id,
                'Customer' => $order->getCustomerName(),
                'Products Availed' => $order->getProductsAvailedNames(),
                'Total' => $order->formattedTotal(),
                'Date Added' => $order->created_at->format('Y-m-d H:i:s'),
            ];

            $data[] = $row;
        }

        // Calculate the total sales
        $totalSales = $orders->sum('total');

        // Calculate the total number of customers
        $totalCustomers = $orders->pluck('customer_id')->unique()->count();

        // Add the total sales row
        $data[] = [
            'ID' => 'Total Sales:',
            'Customer' => '',
            'Products Availed' => '',
            'Total' => $totalSales,
            'Date Added' => '',
        ];

        return collect($data);
    }

    public function headings(): array
    {
        return [
            'ID',
            'Customer',
            'Products Availed',
            'Total',
            'Date Added',
        ];
    }

    public function title(): string
    {
        return 'Order Reports';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:E1')->applyFont(['bold' => true]);
            },
        ];
    }
}
