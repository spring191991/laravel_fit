<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function articles() {
        return $this->belongsToMany(Article::class)->withTimestamps();;
    }

    public static function alltags() {
        return self::withCount('articles')->orderByDesc('articles_count')->get();
    }

    public static function popular() {
        return self::withCount('articles')->orderByDesc('articles_count')->limit(5)->get();
    }
}
