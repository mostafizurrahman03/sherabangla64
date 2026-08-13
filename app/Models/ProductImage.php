<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'product_id',
        'user_id',
        'image',
        'alt_text',
        'sort_order',
        'is_primary',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'sort_order' => 'integer',
            'is_primary' => 'boolean',
        ];
    }

    /**
     * Product image belongs to a product.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Product image belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: Get primary image.
     */
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }

    /**
     * Scope: Get images ordered by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}