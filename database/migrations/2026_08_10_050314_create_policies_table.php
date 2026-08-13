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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();

            // User/Admin who created the policy
            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            // Policy information
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('description');

            // Display / publishing
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);

            // Publishing date
            $table->timestamp('published_at')->nullable();

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
        Schema::dropIfExists('policies');
    }
};