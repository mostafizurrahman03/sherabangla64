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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 255)->nullable()->unique();
            $table->string('phone_number', 20)->nullable()->unique();
            $table->string('password', 255)->nullable();

            $table->foreignId('district_id')
                ->constrained('districts')
                ->restrictOnDelete();

            $table->foreignId('thana_id')
                ->constrained('thanas')
                ->restrictOnDelete();

            $table->text('address');

            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(true);

            $table->timestampTz('last_login_at')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
