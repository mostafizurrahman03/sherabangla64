<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'name',
        'slug',
        'sku',
        'short_desc',
        'full_desc',
        'regular_price',
        'sale_price',
        'discount',
        'category_id',
        'sub_category_id',
        'brand_id',
        'image',
        'stock_quantity',
        'low_stock_threshold',
        'status',
        'is_featured',
        'sort_order',
        'meta_title',
        'meta_description',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'regular_price' => 'decimal:2',
            'sale_price' => 'decimal:2',
            'discount' => 'decimal:2',

            'stock_quantity' => 'integer',
            'low_stock_threshold' => 'integer',
            'sort_order' => 'integer',

            'is_featured' => 'boolean',

            'published_at' => 'datetime',
        ];
    }

    /**
     * Product belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Product belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Product belongs to a sub-category.
     */
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * Product belongs to a brand.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Product has many images.
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Scope: Published products.
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    /**
     * Scope: Featured products.
     */
    public function scopeFeatured($query)
    {
        return $query
            ->where('status', 'published')
            ->where('is_featured', true);
    }

    /**
     * Scope: Products currently on sale.
     */
    public function scopeOnSale($query)
    {
        return $query
            ->where('status', 'published')
            ->whereNotNull('sale_price')
            ->whereColumn('sale_price', '<', 'regular_price');
    }

    /**
     * Scope: Products currently in stock.
     */
    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    /**
     * Scope: Low stock products.
     */
    public function scopeLowStock($query)
    {
        return $query
            ->where('stock_quantity', '>', 0)
            ->whereColumn(
                'stock_quantity',
                '<=',
                'low_stock_threshold'
            );
    }

    /**
     * Get the current price.
     */
    public function getCurrentPriceAttribute()
    {
        return $this->sale_price !== null
            && $this->sale_price < $this->regular_price
            ? $this->sale_price
            : $this->regular_price;
    }

    /**
     * Check whether product is in stock.
     */
    public function getIsInStockAttribute(): bool
    {
        return $this->stock_quantity > 0;
    }

    /**
     * Check whether product is on sale.
     */
    public function getIsOnSaleAttribute(): bool
    {
        return $this->sale_price !== null
            && $this->sale_price < $this->regular_price;
    }
}