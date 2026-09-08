<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Coupon extends Model
{
    /**
     * Table name
     */
    protected $table = 'coupons';

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'coupon_code',
        'coupon_type',
        'discount_value',
        'minimum_order_amount',
        'max_discount_amount',
        'usage_limit',
        'per_user_limit',
        'valid_from',
        'valid_to',
        'is_active',
    ];

    /**
     * Attribute casting
     */
    protected $casts = [
        'discount_value'       => 'decimal:4',
        'minimum_order_amount' => 'decimal:4',
        'max_discount_amount'  => 'decimal:4',
        'valid_from'           => 'datetime',
        'valid_to'             => 'datetime',
        'is_active'            => 'boolean',
    ];

    /**
     * Coupon usages
     */
    public function usages(): HasMany
    {
        return $this->hasMany(
            CouponUsage::class,
            'coupon_id',
            'id'
        );
    }
}