<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['images/arsitektur1.jpeg', 'Arsitektur Utama Masjid PUSDAI', 0],
            ['images/galeri-mushaf.jpeg', 'Mushaf Al-Qur\'an Pusdai Jabar', 1],
            ['images/galeri-manasik.png', 'Bimbingan Manasik Haji & Umrah', 2],
            ['images/galeri-perpustakaan.jpeg', 'Perpustakaan Digital PUSDAI', 3],
            ['images/pengajian-assalam-di-masjid.jpeg', 'Kajian Rutin Majelis Assalam', 4],
            ['images/arsitektur2.jpeg', 'Kemegahan Lanskap Masjid PUSDAI', 5],
            ['images/khitan_massal1.jpeg', 'Bakti Sosial Khitanan Massal', 6],
            ['images/santunan_jompo2.jpeg', 'Santunan Pusdai Peduli Dhuafa', 7],
            ['images/pengajian-IPHI-masjid.jpeg', 'Pengajian Akbar IPHI Jabar', 8],
            ['images/kunjungan-mushaf.jpeg', 'Edukasi & Pameran Mushaf', 9],
            ['images/arsitektur3.jpeg', 'Fasilitas & Selasar Masjid', 10],
            ['images/pengajian_persistri.jpeg', 'Kajian Jama\'ah Persistri', 11],
        ];

        foreach ($items as [$gambar, $judul, $urutan]) {
            Gallery::firstOrCreate(
                ['gambar' => $gambar],
                ['judul' => $judul, 'kategori' => 'Dokumentasi', 'urutan' => $urutan]
            );
        }
    }
}
