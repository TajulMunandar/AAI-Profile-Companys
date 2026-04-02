<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Traits\Slugable;

class Kategori extends Model
{
    use HasFactory, Slugable;

    protected $fillable = ['nama', 'slug'];

    protected function getSlugSourceField(): string
    {
        return 'nama';
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
