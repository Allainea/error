<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesReportController extends Controller
{
    public function weekly()
    {
        $sales = DB::table('sales')
            ->select('date', DB::raw('SUM(total_sales) as total_sales'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return view('sales.weekly', compact('sales'));
    }

    public function monthly()
    {
        $sales = DB::table('sales')
            ->join('customers', 'sales.customer_id', '=', 'customers.id')
            ->join('products', 'sales.product_id', '=', 'products.id')
            ->select(
                DB::raw('DATE_FORMAT(sales.date, "%Y-%m") as month'),
                'customers.name as customer_name',
                'products.name as product_name',
                'sales.total_sales'
            )
            ->groupBy('month', 'customer_name', 'product_name')
            ->orderBy('month')
            ->get();

        return view('sales.monthly', compact('sales'));
    }

}
