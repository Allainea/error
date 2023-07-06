<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::with(['items', 'payments'])->get();
        $customers_count = Customer::count();
        $products_count = Product::count();

        $weekly_sales = $this->calculateWeeklySales($orders);
        $monthly_sales = $this->calculateMonthlySales($orders);

        return view('home', [
            'orders_count' => $orders->count(),
            'income' => $this->calculateTotalIncome($orders),
            'income_today' => $this->calculateIncomeToday($orders),
            'customers_count' => $customers_count,
            'products_count' => $products_count,
            'weekly_sales' => $weekly_sales,
            'monthly_sales' => $monthly_sales
        ]);
    }

    private function calculateWeeklySales($orders)
    {
        $startOfWeek = now()->startOfWeek();
        $endOfWeek = now()->endOfWeek();

        $weeklySales = $orders->whereBetween('created_at', [$startOfWeek, $endOfWeek])->map(function($order) {
            if ($order->receivedAmount() > $order->total()) {
                return $order->total();
            }
            return $order->receivedAmount();
        })->sum();

        return $weeklySales;
    }

    private function calculateMonthlySales($orders)
    {
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        $monthlySales = $orders->whereBetween('created_at', [$startOfMonth, $endOfMonth])->map(function($order) {
            if ($order->receivedAmount() > $order->total()) {
                return $order->total();
            }
            return $order->receivedAmount();
        })->sum();

        return $monthlySales;
    }

    private function calculateTotalIncome($orders)
    {
        $totalIncome = $orders->map(function($order) {
            if ($order->receivedAmount() > $order->total()) {
                return $order->total();
            }
            return $order->receivedAmount();
        })->sum();

        return $totalIncome;
    }

    private function calculateIncomeToday($orders)
    {
        $startOfDay = now()->startOfDay();

        $incomeToday = $orders->where('created_at', '>=', $startOfDay)->map(function($order) {
            if ($order->receivedAmount() > $order->total()) {
                return $order->total();
            }
            return $order->receivedAmount();
        })->sum();

        return $incomeToday;
    }

}
