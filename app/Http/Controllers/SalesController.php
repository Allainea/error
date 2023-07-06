<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Carbon\Carbon;

class SalesController extends Controller
{
    public function generateReport(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Validate the input
        $request->validate([
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        // Check if both start and end dates are not selected
        if (empty($startDate) && empty($endDate)) {
            return redirect()->route('sales.report')->withErrors(['error' => 'Please select a date range to filter.']);
        }

        $sales = Order::with(['customer', 'orderItems.product'])
            ->select(
                'orders.id',
                'orders.created_at',
                'customers.first_name',
                'customers.last_name',
                DB::raw('SUM(order_items.price * order_items.quantity) AS total_amount')
            )
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->when($startDate, function ($query, $startDate) {
                return $query->whereDate('orders.created_at', '>=', $startDate);
            })
            ->when($endDate, function ($query, $endDate) {
                return $query->whereDate('orders.created_at', '<=', $endDate);
            })
            ->groupBy('orders.id', 'orders.created_at', 'customers.first_name', 'customers.last_name')
            ->orderBy('orders.created_at', 'desc')
            ->paginate(10)->withQueryString();

        // Perform calculations for total sales, number of sales, and customers served
        $totalSales = $sales->sum('total_amount');
        $numberOfSales = $sales->count();
        $totalCustomers = $sales->pluck('customer_id')->unique()->count();

        // Determine the top-selling products based on quantity sold
        $topProductsByQuantity = OrderItem::with('product')
            ->select(
                'product_id',
                DB::raw('SUM(quantity) as total_quantity')
            )
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->take(5)
            ->get();

        // Determine the top-selling products based on total sales amount
        $topProductsBySales = OrderItem::with('product')
            ->select(
                'product_id',
                DB::raw('SUM(price * quantity) as total_sales')
            )
            ->groupBy('product_id')
            ->orderByDesc('total_sales')
            ->take(5)
            ->get();

        // Combine the top products from both quantity and sales
        $topProducts = $topProductsByQuantity->merge($topProductsBySales)->unique();

        // Pass the variables to the view
        return view('sales.report', compact('sales', 'totalSales', 'numberOfSales', 'totalCustomers', 'topProducts'));
    }


    public function filterReport(Request $request)
    {
        // Retrieve the form input
        $startDate = Carbon::createFromFormat('Y-m-d', $request->input('start_date'))->startOfDay();
        $endDate = Carbon::createFromFormat('Y-m-d', $request->input('end_date'))->endOfDay();

        // Filter the sales report data
        $sales = Order::with(['customer', 'orderItems.product'])
            ->select(
                'orders.id',
                'orders.created_at',
                'customers.first_name',
                'customers.last_name',
                DB::raw('SUM(order_items.price * order_items.quantity) AS total_amount')
            )
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->whereDate('orders.created_at', '>=', $startDate)
            ->whereDate('orders.created_at', '<=', $endDate)
            ->groupBy('orders.id', 'orders.created_at', 'customers.first_name', 'customers.last_name')
            ->orderBy('orders.created_at', 'desc')
            ->paginate(10)->withQueryString();

        return view('sales.report', compact('sales'));
    }


    public function printReport()
    {
        // Retrieve the sales report data
        $sales = Order::with(['customer', 'orderItems.product'])
            ->select(
                'orders.id',
                'orders.created_at',
                'customers.first_name',
                'customers.last_name',
                DB::raw('SUM(order_items.price * order_items.quantity) AS total_amount')
            )
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->join('order_items', 'order_items.order_id', '=', 'orders.id')
            ->groupBy('orders.id', 'orders.created_at', 'customers.first_name', 'customers.last_name')
            ->orderBy('orders.created_at', 'desc')
            ->get();

        // Generate the PDF using Dompdf
        $dompdf = new Dompdf();
        $dompdf->loadView('sales.print', compact('sales'));
        $dompdf->setPaper('A4', 'portrait');

        // Output the PDF as a string
        $output = $dompdf->output();

        // Return the PDF for the user to download
        return response($output)->header('Content-Type', 'application/pdf');
    }
}


