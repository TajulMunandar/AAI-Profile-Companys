<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Slugable;

class Service extends Model
{
    use HasFactory, Slugable;

    protected $fillable = ['title', 'slug', 'description', 'image', 'icon'];
}
