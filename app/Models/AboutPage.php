<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class AboutPage extends Model
{
    protected $fillable = [
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'mission_title',
        'mission_description',
        'mission_image',
        'vision_title',
        'vision_description',
        'story_title',
        'story_content',
        'story_image',
        'values_title',
        'values',
        'team_title',
        'team_members',
        'stats',
        'contact_email',
        'contact_phone',
        'contact_address',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_active',
    ];

    protected $casts = [
        'values' => 'array',
        'team_members' => 'array',
        'stats' => 'array',
        'is_active' => 'boolean',
    ];

    // Helper: Get active about page
    public static function getActive()
    {
        return self::where('is_active', true)->first() ?? self::createDefault();
    }

    // Helper: Create default if not exists
    public static function createDefault()
    {
        return self::create([
            'hero_title' => 'About Sera Bangla',
            'hero_subtitle' => 'Best of Bangla, Best Products',
            'mission_title' => 'Our Mission',
            'mission_description' => 'To provide every household with authentic, high-quality Bangla products at affordable prices.',
            'story_title' => 'Our Story',
            'story_content' => '<p>Welcome to Sera Bangla – your trusted destination for authentic Bangladeshi products. We believe in the rich heritage of Bangladesh and want to bring the best of Bangla to your doorstep.</p>',
            'values' => [
                ['icon' => 'fa-heart', 'title' => 'Quality First', 'description' => 'We never compromise on quality.'],
                ['icon' => 'fa-handshake', 'title' => 'Trust & Integrity', 'description' => 'Building trust with every transaction.'],
                ['icon' => 'fa-star', 'title' => 'Customer Satisfaction', 'description' => 'Your happiness is our priority.'],
                ['icon' => 'fa-leaf', 'title' => 'Sustainability', 'description' => 'Promoting sustainable practices.'],
            ],
            'stats' => [
                ['number' => '500+', 'label' => 'Happy Customers', 'icon' => 'fa-users'],
                ['number' => '100+', 'label' => 'Products', 'icon' => 'fa-box'],
                ['number' => '50+', 'label' => 'Brands', 'icon' => 'fa-tag'],
                ['number' => '99%', 'label' => 'Satisfaction Rate', 'icon' => 'fa-smile'],
            ],
            'contact_email' => 'info@serabangla.com',
            'contact_phone' => '+880 1234-567890',
            'contact_address' => 'Dhaka, Bangladesh',
        ]);
    }

    // Accessor for image URL
    public function getHeroImageUrlAttribute()
    {
        return $this->hero_image ? asset('storage/' . $this->hero_image) : null;
    }

    public function getMissionImageUrlAttribute()
    {
        return $this->mission_image ? asset('storage/' . $this->mission_image) : null;
    }

    public function getStoryImageUrlAttribute()
    {
        return $this->story_image ? asset('storage/' . $this->story_image) : null;
    }
}