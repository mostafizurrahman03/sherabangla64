<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'phone_no',
        'password',
        'role_id',
        'image',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }

    public function brands()
    {
        return $this->hasMany(Brand::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    public function policies()
    {
        return $this->hasMany(Policy::class);
    }
}