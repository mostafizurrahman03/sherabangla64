<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CouponUsage extends Model
{
    /**
     * Table name
     */
    protected $table = 'coupon_usages';

    /**
     * Primary key
     */
    protected $primaryKey = 'id';

    /**
     * Primary key type
     */
    protected $keyType = 'int';

    /**
     * Auto increment
     */
    public $incrementing = true;

    /**
     * Timestamps
     */
    public $timestamps = false;

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'coupon_id',
        'order_id',
        'customer_id',
        'discount_applied',
        'used_at',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'discount_applied' => 'decimal:4',
        'used_at' => 'datetime',
    ];

    /**
     * Coupon
     */
    public function coupon(): BelongsTo
    {
        return $this->belongsTo(
            Coupon::class,
            'coupon_id',
            'id'
        );
    }

    /**
     * Order
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(
            Order::class,
            'order_id',
            'order_id'
        );
    }

    /**
     * Customer
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(
            Customer::class,
            'customer_id',
            'customer_id'
        );
    }
}