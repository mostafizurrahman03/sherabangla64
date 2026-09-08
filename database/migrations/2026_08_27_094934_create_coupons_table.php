<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {

            // Primary Key
            $table->id();

            // Coupon Code
            $table->string('coupon_code', 50)->unique();

            // Coupon Type
            $table->enum('coupon_type', [
                'PERCENTAGE',
                'FIXED_AMOUNT',
                'FREE_SHIPPING',
            ]);

            // Discount Value
            // PERCENTAGE: 10 = 10%
            // FIXED_AMOUNT: 1000 = 1000 currency
            // FREE_SHIPPING: can be 0
            $table->decimal('discount_value', 19, 4)
                ->default(0);

            // Minimum Order Amount
            $table->decimal('minimum_order_amount', 19, 4)
                ->default(0);

            // Maximum Discount Amount
            // Mainly used for percentage coupons
            $table->decimal('max_discount_amount', 19, 4)
                ->nullable();

            // Total Usage Limit
            // NULL = Unlimited
            $table->unsignedInteger('usage_limit')
                ->nullable();

            // Per User Usage Limit
            $table->unsignedInteger('per_user_limit')
                ->default(1);

            // Coupon Validity
            $table->dateTime('valid_from');

            $table->dateTime('valid_to');

            // Status
            $table->boolean('is_active')
                ->default(true);

            // Timestamps
            $table->timestamps();

            // Indexes
            $table->index('is_active');

            $table->index([
                'valid_from',
                'valid_to'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};