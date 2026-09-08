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
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            $table->string('order_number', 30)->unique();

            // Users
            $table->foreignId('user_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            // Customer
            $table->foreignId('customer_id')
                ->nullable()
                ->constrained('customers')
                ->nullOnDelete();

            // Coupon
            $table->foreignId('coupon_id')
                ->nullable()
                ->constrained('coupons')
                ->nullOnDelete();

            $table->string('coupon_code', 50)->nullable();

            // Shipping Information
            $table->string('shipping_name', 100)->nullable();
            $table->string('shipping_phone', 30)->nullable();
            $table->string('shipping_email', 100)->nullable();
            $table->text('shipping_address')->nullable();
            // $table->string('district_name', 100)->nullable();
            // $table->string('thana_name', 100)->nullable();

            // Payment
            $table->string('payment_method', 50);
            $table->string('payment_status', 30)->default('PENDING');

            // Order Status
            $table->string('order_status', 30)->default('PLACED');

            // Amount
            $table->decimal('subtotal', 19, 4);
            $table->decimal('shipping_fee', 19, 4)->default(0);
            $table->decimal('discount_amount', 19, 4)->default(0);
            $table->decimal('grand_total', 19, 4);

            // Other 
            $table->text('order_note')->nullable();
            $table->string('ip_address', 45)->nullable();

            // Timestamps
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('shipped_at')->nullable();
            $table->timestamp('delivered_at')->nullable();

            $table->timestamps();
            
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
