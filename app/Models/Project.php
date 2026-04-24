<?php

namespace App\Models;

use App\Traits\Slugable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, Slugable;

    protected $fillable = ['title', 'slug', 'description', 'date', 'client_name', 'project_type', 'location', 'project_director', 'image', 'image_2', 'image_3'];
}
