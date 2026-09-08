<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class District extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Mass assignable attributes.
     */
    protected $fillable = [
        'division_id',
        'name',
        'bn_name',
        'code',
        'is_active',
    ];

    /**
     * Attribute casting.
     */
    protected $casts = [
        'division_id' => 'integer',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * District belongs to a division.
     */
    public function division()
    {
        return $this->belongsTo(
            Division::class,
            'division_id'
        );
    }

    /**
     * District has many thanas.
     */
    public function thanas()
    {
        return $this->hasMany(
            Thana::class,
            'district_id'
        );
    }

    /**
     * District has many customers.
     */
    public function customers()
    {
        return $this->hasMany(
            Customer::class,
            'district_id'
        );
    }

    /**
     * Scope: active districts only.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope: search districts.
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
     * Get district name with code.
     */
    public function getFullNameAttribute()
    {
        return $this->code
            ? "{$this->name} ({$this->code})"
            : $this->name;
    }

    /**
     * Get Bengali district name.
     */
    public function getBengaliNameAttribute()
    {
        return $this->bn_name ?? $this->name;
    }
}
