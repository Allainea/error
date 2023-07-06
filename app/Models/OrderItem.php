<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'price',
        'quantity',
        'product_id',
        'order_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function getTotalAmountAttribute()
    {
        return $this->price * $this->quantity;
    }

    public function getFormattedTotalAmountAttribute()
    {
        return number_format($this->getTotalAmountAttribute(), 2);
    }

}
