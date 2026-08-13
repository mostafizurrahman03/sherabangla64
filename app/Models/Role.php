<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Role has many users.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Role belongs to many permissions.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class,'role_permissions');
    }
}