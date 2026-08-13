<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'integer',
        ];
    }

    /**
     * Menu belongs to a user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}