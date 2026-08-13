<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'user_id',
        'title',
        'subtitle',
        'description',
        'image',
        'button_text',
        'button_url',
        'sort_order',
        'is_active',
        'start_at',
        'end_at',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
            'start_at' => 'datetime',
            'end_at' => 'datetime',
        ];
    }

    /**
     * Slider belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope: Get active sliders.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: Get currently scheduled sliders.
     */
    public function scopeCurrentlyActive($query)
    {
        return $query
            ->where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('start_at')
                    ->orWhere('start_at', '<=', now());
            })
            ->where(function ($query) {
                $query->whereNull('end_at')
                    ->orWhere('end_at', '>=', now());
            });
    }
}