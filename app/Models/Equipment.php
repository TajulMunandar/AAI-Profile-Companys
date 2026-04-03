<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'is_active',
        'order'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}