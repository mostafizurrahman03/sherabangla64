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

            // User/Admin who created the slider
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Slider content
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();

            // Slider image
            $table->string('image');

            // Button
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();

            // Display order
            $table->unsignedInteger('sort_order')->default(0);

            // Active / inactive
            $table->boolean('is_active')->default(true);

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