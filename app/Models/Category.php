<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'description',
        'image',
        'sort_order',
        'is_active',
        'meta_title',
        'meta_description',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    /**
     * Category belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Category has many sub-categories.
     */
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    /**
     * Category has many products.
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}