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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();

            // User/Admin who created the brand
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Brand information
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            // Brand logo/image
            $table->string('logo')->nullable();

            // Display order
            $table->unsignedInteger('sort_order')->default(0);

            // Active / inactive
            $table->boolean('is_active')->default(true);

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};