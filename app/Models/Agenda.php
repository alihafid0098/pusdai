<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'judul',
        'kategori',
        'pemateri',
        'hari',
        'waktu',
        'lokasi',
        'tanggal',
        'ringkasan',
        'is_rutin',
        'is_published',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'is_rutin' => 'boolean',
        'is_published' => 'boolean',
    ];

    public function scopeRutin($query)
    {
        return $query->where('is_rutin', true);
    }

    public function scopeKegiatan($query)
    {
        return $query->where('is_rutin', false);
    }

    public function scopeTerbit($query)
    {
        return $query->where('is_published', true);
    }
}
