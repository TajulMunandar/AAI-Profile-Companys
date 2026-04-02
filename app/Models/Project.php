<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Slugable;

class Project extends Model
{
    use HasFactory, Slugable;

    protected $fillable = ['title', 'slug', 'description', 'date', 'client_name', 'project_type', 'location', 'project_director', 'image'];
}
