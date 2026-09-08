<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thana extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'bn_name',
        'district_id',
        'code',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get the district that owns the thana.
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the customers for the thana.
     */
    public function customers()
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * Scope a query to only include active thanas.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to search thanas by name.
     */
    public function scopeSearch($query, $search)
    {
        return $query->where('name', 'like', "%{$search}%")
                     ->orWhere('bn_name', 'like', "%{$search}%");
    }

    /**
     * Scope a query to filter thanas by district.
     */
    public function scopeByDistrict($query, $districtId)
    {
        return $query->where('district_id', $districtId);
    }

    /**
     * Get the thana name with code.
     */
    public function getFullNameAttribute()
    {
        return $this->code ? "{$this->name} ({$this->code})" : $this->name;
    }

    /**
     * Get the thana name in Bengali.
     */
    public function getBengaliNameAttribute()
    {
        return $this->bn_name ?? $this->name;
    }

    /**
     * Get the thana with district name.
     */
    public function getFullAddressAttribute()
    {
        return $this->name . ', ' . ($this->district?->name ?? '');
    }
}