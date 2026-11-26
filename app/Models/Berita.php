<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'kategori',
        'tanggal',
        'gambar',
        'ringkasan',
        'isi',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}