<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'name',
        'bn_name',
        'code',
        'is_active',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Division has many districts.
     */
    public function districts()
    {
        return $this->hasMany(
            District::class,
            'division_id'
        );
    }

    /**
     * Scope: active divisions only.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: search divisions.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
                ->orWhere('bn_name', 'like', "%{$search}%")
                ->orWhere('code', 'like', "%{$search}%");
        });
    }

    /**
     * Get full division name with code.
     */
    public function getFullNameAttribute()
    {
        return $this->code
            ? "{$this->name} ({$this->code})"
            : $this->name;
    }

    /**
     * Get Bengali division name.
     */
    public function getBengaliNameAttribute()
    {
        return $this->bn_name ?? $this->name;
    }
}
