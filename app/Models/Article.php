<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Slugable;

class Article extends Model
{
    use HasFactory, Slugable;

    protected $fillable = ['title', 'slug', 'content', 'kategori_id', 'tag', 'user_id', 'image', 'excerpt'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
