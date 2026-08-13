<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Created by user/admin
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Basic information
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();

            // Category image
            $table->string('image')->nullable();

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

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};