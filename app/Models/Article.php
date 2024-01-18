<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'excerpt',
        'content',
        'image',
    ];

    public function tags() {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
