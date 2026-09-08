<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            // Hero Section
            $table->string('hero_title')->default('About Sera Bangla');
            $table->text('hero_subtitle')->nullable();
            $table->string('hero_image')->nullable();

            // Mission Section
            $table->string('mission_title')->default('Our Mission');
            $table->text('mission_description')->nullable();
            $table->string('mission_image')->nullable();

            // Vision Section
            $table->string('vision_title')->default('Our Vision');
            $table->text('vision_description')->nullable();

            // Story Section
            $table->string('story_title')->default('Our Story');
            $table->longText('story_content')->nullable();
            $table->string('story_image')->nullable();

            // Values Section
            $table->string('values_title')->default('Our Core Values');
            $table->json('values')->nullable(); // [{icon, title, description}]

            // Team Section
            $table->string('team_title')->default('Meet Our Team');
            $table->json('team_members')->nullable(); // [{name, designation, image, bio}]

            // Stats Section
            $table->json('stats')->nullable(); // [{number, label, icon}]

            // Contact Info
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_address')->nullable();

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            // Status
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_pages');
    }
};