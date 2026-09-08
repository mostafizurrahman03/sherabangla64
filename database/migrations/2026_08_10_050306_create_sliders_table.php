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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained(users)
                ->nullOnDelete();

            // main_slider | side_top | side_bottom
            $table->string('position')
                ->default('main_slider')
                ->index();

            // Banner image
            $table->string('image');

            // Product page URL
            $table->string('link_url')->nullable();

            // Display order
            $table->unsignedInteger('sort_order')->default(0);

            // Active / inactive
            $table->boolean('is_active')->default(true)->index();

            // Optional scheduling
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();

            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};