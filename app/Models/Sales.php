<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';

    protected $fillable = [
        'customer_id',
        'product_id',
        'quantity',
        'amount',
    ];

    // Define any relationships or additional methods as needed
}
