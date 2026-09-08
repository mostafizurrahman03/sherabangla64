<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'customer_id',
        'coupon_id',
        'coupon_code',
        'shipping_name',
        'shipping_phone',
        'shipping_email',
        'shipping_address',
        // 'district_name',
        // 'thana_name',
        'payment_method',
        'payment_status',
        'order_status',
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

    protected $casts = [
        'subtotal' => 'decimal:4',
        'shipping_fee' => 'decimal:4',
        'discount_amount' => 'decimal:4',
        'grand_total' => 'decimal:4',
        'paid_at' => 'datetime',
        'shipped_at' => 'datetime',
        'delivered_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Constants for statuses
    const ORDER_STATUSES = [
        'PLACED' => 'Placed',
        'CONFIRMED' => 'Confirmed',
        'PROCESSING' => 'Processing',
        'SHIPPED' => 'Shipped',
        'DELIVERED' => 'Delivered',
        'CANCELLED' => 'Cancelled',
        'REFUNDED' => 'Refunded',
    ];

    const PAYMENT_STATUSES = [
        'PENDING' => 'Pending',
        'PAID' => 'Paid',
        'FAILED' => 'Failed',
        'REFUNDED' => 'Refunded',
    ];

    const PAYMENT_METHODS = [
        'COD' => 'Cash on Delivery',
        'BKASH' => 'bKash',
        'NAGAD' => 'Nagad',
        'ROCKET' => 'Rocket',
        'CARD' => 'Credit/Debit Card',
        'BANK' => 'Bank Transfer',
    ];

    // Relationships
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('order_status', 'PLACED');
    }

    public function scopeProcessing($query)
    {
        return $query->whereIn('order_status', ['CONFIRMED', 'PROCESSING']);
    }

    public function scopeCompleted($query)
    {
        return $query->where('order_status', 'DELIVERED');
    }

    public function scopeCancelled($query)
    {
        return $query->where('order_status', 'CANCELLED');
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('order_status', $status);
    }

    // Accessors
    public function getStatusBadgeAttribute(): string
    {
        $badges = [
            'PLACED' => 'badge-warning',
            'CONFIRMED' => 'badge-info',
            'PROCESSING' => 'badge-primary',
            'SHIPPED' => 'badge-secondary',
            'DELIVERED' => 'badge-success',
            'CANCELLED' => 'badge-danger',
            'REFUNDED' => 'badge-dark',
        ];

        return $badges[$this->order_status] ?? 'badge-light';
    }

    public function getPaymentStatusBadgeAttribute(): string
    {
        $badges = [
            'PENDING' => 'badge-warning',
            'PAID' => 'badge-success',
            'FAILED' => 'badge-danger',
            'REFUNDED' => 'badge-dark',
        ];

        return $badges[$this->payment_status] ?? 'badge-light';
    }

    public function getFormattedSubtotalAttribute(): string
    {
        return number_format($this->subtotal, 2);
    }

    public function getFormattedGrandTotalAttribute(): string
    {
        return number_format($this->grand_total, 2);
    }

    // Helper Methods
    public function isPending(): bool
    {
        return $this->order_status === 'PLACED';
    }

    public function isProcessing(): bool
    {
        return in_array($this->order_status, ['CONFIRMED', 'PROCESSING']);
    }

    public function isDelivered(): bool
    {
        return $this->order_status === 'DELIVERED';
    }

    public function isCancelled(): bool
    {
        return $this->order_status === 'CANCELLED';
    }

    public function canCancel(): bool
    {
        return in_array($this->order_status, ['PLACED', 'CONFIRMED']);
    }

    public function canUpdate(): bool
    {
        return !in_array($this->order_status, ['DELIVERED', 'CANCELLED', 'REFUNDED']);
    }
}