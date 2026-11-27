<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = ['judul', 'gambar', 'kategori', 'urutan'];

    protected $casts = ['urutan' => 'integer'];

    /**
     * Foto bawaan situs disimpan di public/images, foto unggahan admin
     * disimpan di storage publik.
     */
    public function getGambarUrlAttribute(): string
    {
        if (str_starts_with($this->gambar, 'images/')) {
            return asset($this->gambar);
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->url($this->gambar);
    }
}
