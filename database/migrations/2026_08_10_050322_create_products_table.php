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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // User/Admin who created the product
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Product basic information
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->unique()->nullable();

            $table->text('short_desc')->nullable();
            $table->longText('full_desc')->nullable();

            // Pricing
            $table->decimal('regular_price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->default(0);

            // Category
            $table->foreignId('category_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('sub_category_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Brand
            $table->foreignId('brand_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            // Product image / thumbnail
            $table->string('image')->nullable();

            // Inventory
            $table->unsignedInteger('stock_quantity')->default(0);
            $table->unsignedInteger('low_stock_threshold')->default(5);

            // Product status
            $table->enum('status', [
                'draft',
                'published',
                'archived',
            ])->default('draft');

            // Featured / visibility
            $table->boolean('is_featured')->default(false);

            // Ordering
            $table->unsignedInteger('sort_order')->default(0);

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            // Publishing
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};