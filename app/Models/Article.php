<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Article extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'penulis',
        'gambar',
        'ringkasan',
        'isi',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected static function booted(): void
    {
        static::saving(function (Article $article) {
            if (blank($article->slug)) {
                $article->slug = Str::slug($article->judul).'-'.Str::lower(Str::random(4));
            }

            if ($article->is_published && blank($article->published_at)) {
                $article->published_at = now();
            }
        });
    }

    /**
     * Foto bawaan situs ada di public/images, unggahan admin di storage.
     */
    public function getGambarUrlAttribute(): string
    {
        if (blank($this->gambar)) {
            return '';
        }

        if (str_starts_with($this->gambar, 'images/')) {
            return asset($this->gambar);
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->url($this->gambar);
    }

    public function scopeTerbit($query)
    {
        return $query->where('is_published', true);
    }
}
