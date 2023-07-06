<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Exports\OrdersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;
use App\Http\Requests\OrderStoreRequest;


class OrderController extends Controller
{
    public function index(Request $request) {
        $orders = new Order();
        if($request->start_date) {
            $orders = $orders->where('created_at', '>=', $request->start_date);
        }
        if($request->end_date) {
            $orders = $orders->where('created_at', '<=', $request->end_date . ' 23:59:59');
        }
        $orders = $orders->with(['items', 'payments', 'customer'])->latest()->paginate(5);

        $total = $orders->map(function($i) {
            return $i->total();
        })->sum();
        $receivedAmount = $orders->map(function($i) {
            return $i->receivedAmount();
        })->sum();

        return view('orders.index', compact('orders', 'total', 'receivedAmount'));
    }

    public function store(OrderStoreRequest $request)
    {
        $order = Order::create([
            'customer_id' => $request->customer_id,
            'user_id' => $request->user()->id,
        ]);

        $cart = $request->user()->cart()->get();
        $totalValue = 0; // Initialize the total value of the order

        foreach ($cart as $item) {
            $itemTotal = $item->price * $item->pivot->quantity;
            $totalValue += $itemTotal; // Accumulate the item total to calculate the total value

            $order->items()->create([
                'price' => $itemTotal,
                'quantity' => $item->pivot->quantity,
                'product_id' => $item->id,
            ]);

            $item->quantity = $item->quantity - $item->pivot->quantity;
            $item->save();

            // Remove the item from the cart
            $request->user()->cart()->detach($item->id);
        }

        $receivedAmount = $request->amount;

        if ($receivedAmount < $totalValue) {
            return redirect()->back()->with('error', 'Insufficient payment amount. Please enter a higher amount.');
        }

        $order->payments()->create([
            'amount' => $receivedAmount,
            'user_id' => $request->user()->id,
        ]);

        return 'success';
    }



    public function print(Order $order)
    {
        $pdf = new Dompdf();
        $html = View::make('orders.invoice', compact('order'))->render();

        $pdf->loadHtml($html);
        $pdf->render();

        $output = $pdf->output();
        return new Response($output, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="invoice.pdf"',
        ]);
    }

    public function salesReport()
    {
        return view('order.sales-report');
    }

    public function orderTotal()
    {
        return $this->hasOne(OrderTotal::class);
    }


    public function report()
    {
        $start_date = date('Y-m-d', strtotime(request('start_date')));
        $end_date = date('Y-m-d', strtotime(request('end_date')));

        $orders = Order::whereDate('created_at', '>=', $start_date)
                    ->whereDate('created_at', '<=', $end_date)
                    ->paginate(10);

        return view('report.index', ['orders' => $orders]);
    }


    public function export()
    {
        return Excel::download(new OrdersExport, 'orders.xlsx');
    }
}
