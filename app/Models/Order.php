<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItem;
use App\Models\Customer;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'user_id'
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function getCustomerName()
    {
        if ($this->customer) {
            return $this->customer->first_name . ' ' . $this->customer->last_name;
        }
        return 'Walk-in Customer';
    }

    public function getProductsAvailedNames()
    {
        return $this->items->pluck('product.name')->implode("\n");
    }

    public function total()
    {
        return $this->items->map(function ($i) {
            return $i->price;
        })->sum();

        return $this->items->sum(function ($item) {
            return $item->product->price;
        });
    }

    public function formattedTotal()
    {
        return number_format($this->total(), 2);
    }

    public function receivedAmount()
    {
        return $this->payments->map(function ($i) {
            return $i->amount;
        })->sum();
    }

    public function formattedReceivedAmount()
    {
        return number_format($this->receivedAmount(), 2);
    }

    public function getStatus()
    {
        $status = $this->status;

        $statusMap = [
            'pending' => 'Pending',
            'completed' => 'Completed',
        ];

        return $statusMap[$status] ?? 'Unknown';
    }


    public function getTotalAttribute()
    {
        return $this->items()->sum('price');
    }

    public function report()
    {
        // Retrieve the orders for the specified date range
        $start_date = request('start_date');
        $end_date = request('end_date');

        $orders = Order::whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->get();

        return view('report.index', ['orders' => $orders]);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items');
    }

}
