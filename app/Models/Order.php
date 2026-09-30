<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Kolom yang diizinkan untuk dikirim via Order::create()
     */
    protected $fillable = [
        'product_name',
        'price',
        'qty',
        'customer_name',
        'customer_phone',
        'customer_address',
        'status',
    ];
}