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
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();

            // Product
            $table->foreignId('product_id')
                ->constrained()
                ->cascadeOnDelete();

            // User/Admin who uploaded the image
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Image
            $table->string('image');

            // Image information
            $table->string('alt_text')->nullable();

            // Display order
            $table->unsignedInteger('sort_order')->default(0);

            // Primary / thumbnail image
            $table->boolean('is_primary')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
    }
};