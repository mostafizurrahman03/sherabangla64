<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'customer_id',
        'payment_method',
        'payment_status',
        'order_status',
        'address',
        'subtotal',
        'shipping_fee',
        'discount_amount',
        'grand_total',
        'order_note',
        'ip_address',
        'paid_at',
        'shipped_at',
        'delivered_at',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:4',
            'shipping_fee' => 'decimal:4',
            'discount_amount' => 'decimal:4',
            'grand_total' => 'decimal:4',

            'paid_at' => 'datetime',
            'shipped_at' => 'datetime',
            'delivered_at' => 'datetime',
        ];
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}