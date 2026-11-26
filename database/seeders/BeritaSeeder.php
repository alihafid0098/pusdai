<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Berita;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        Berita::create([
            'judul' => 'Kegiatan Keislaman PUSDAI Jawa Barat',
            'slug' => 'kegiatan-keislaman-pusdai-jawa-barat',
            'kategori' => 'Kegiatan',
            'tanggal' => '2026-10-07',
            'gambar' => 'https://images.pexels.com/photos/724921/pexels-photo-724921.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'ringkasan' => 'PUSDAI Jawa Barat terus menyelenggarakan berbagai kegiatan keislaman sebagai bentuk pelayanan kepada masyarakat.',
            'isi' => 'PUSDAI Jawa Barat terus menyelenggarakan berbagai kegiatan keislaman sebagai bentuk pelayanan kepada masyarakat. Kegiatan tersebut menjadi sarana untuk mempererat silaturahmi dan meningkatkan pemahaman keagamaan.'
        ]);

        Berita::create([
            'judul' => 'Kajian Islam dan Pembinaan Umat',
            'slug' => 'kajian-islam-dan-pembinaan-umat',
            'kategori' => 'Kajian',
            'tanggal' => '2026-10-05',
            'gambar' => 'https://images.pexels.com/photos/161439/pexels-photo-161439.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'ringkasan' => 'Kajian Islam menjadi salah satu kegiatan penting dalam meningkatkan wawasan keagamaan masyarakat.',
            'isi' => 'Kajian Islam merupakan salah satu kegiatan yang memiliki peran penting dalam meningkatkan wawasan keagamaan masyarakat. PUSDAI menghadirkan berbagai kegiatan pembinaan umat secara berkelanjutan.'
        ]);

        Berita::create([
            'judul' => 'Informasi Pelayanan PUSDAI Jawa Barat',
            'slug' => 'informasi-pelayanan-pusdai',
            'kategori' => 'Informasi',
            'tanggal' => '2026-10-02',
            'gambar' => 'https://images.pexels.com/photos/4608024/pexels-photo-4608024.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'ringkasan' => 'PUSDAI Jawa Barat menyediakan berbagai layanan keislaman yang dapat dimanfaatkan oleh masyarakat.',
            'isi' => 'PUSDAI Jawa Barat menyediakan berbagai layanan keislaman yang dapat dimanfaatkan oleh masyarakat. Informasi mengenai layanan dapat diperoleh melalui halaman layanan dan kontak PUSDAI.'
        ]);

        Berita::create([
            'judul' => 'Membangun Semangat Dakwah di Tengah Masyarakat',
            'slug' => 'semangat-dakwah-masyarakat',
            'kategori' => 'Dakwah',
            'tanggal' => '2026-09-30',
            'gambar' => 'https://images.pexels.com/photos/3889858/pexels-photo-3889858.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'ringkasan' => 'PUSDAI terus mendorong semangat dakwah di tengah masyarakat melalui berbagai kegiatan keagamaan.',
            'isi' => 'PUSDAI terus mendorong semangat dakwah di tengah masyarakat melalui berbagai kegiatan keagamaan, pembinaan, kajian dan program pelayanan umat.'
        ]);

        Berita::create([
            'judul' => 'PUSDAI dan Pelayanan Sosial Masyarakat',
            'slug' => 'pelayanan-sosial-masyarakat',
            'kategori' => 'Sosial',
            'tanggal' => '2026-09-28',
            'gambar' => 'https://images.pexels.com/photos/6069534/pexels-photo-6069534.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'ringkasan' => 'Pelayanan sosial merupakan salah satu bentuk kepedulian terhadap masyarakat.',
            'isi' => 'Pelayanan sosial merupakan salah satu bentuk kepedulian terhadap masyarakat. PUSDAI berupaya menghadirkan kegiatan yang memberikan manfaat bagi masyarakat.'
        ]);

        Berita::create([
            'judul' => 'PUSDAI sebagai Pusat Dakwah Islam Jawa Barat',
            'slug' => 'pusdai-pusat-dakwah-islam',
            'kategori' => 'PUSDAI',
            'tanggal' => '2026-09-25',
            'gambar' => 'https://images.pexels.com/photos/8814825/pexels-photo-8814825.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'ringkasan' => 'PUSDAI Jawa Barat merupakan salah satu pusat kegiatan dakwah Islam.',
            'isi' => 'PUSDAI Jawa Barat merupakan salah satu pusat kegiatan dakwah Islam yang menyediakan berbagai kegiatan keagamaan, pelayanan umat dan fasilitas untuk masyarakat.'
        ]);
    }
}