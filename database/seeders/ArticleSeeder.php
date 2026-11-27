<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'judul' => 'Bimbingan Manasik Haji & Umrah PUSDAI Jawa Barat',
                'kategori' => 'Layanan',
                'penulis' => 'Sekretariat PUSDAI',
                'gambar' => 'images/manasik.png',
                'ringkasan' => 'Pelaksanaan bimbingan manasik haji dan umrah secara profesional dan terarah sesuai tuntunan syariat Islam.',
                'isi' => 'PUSDAI Jawa Barat menyelenggarakan bimbingan manasik haji dan umrah bagi calon jamaah. Kegiatan ini mencakup tata cara ibadah, adab di tanah suci, serta pembekalan kesehatan dan logistik. Bimbingan dibimbing langsung oleh asatidzah dan petugas KBIHU PUSDAI. Informasi jadwal dan pendaftaran dapat diperoleh melalui Sekretariat PUSDAI.',
            ],
            [
                'judul' => 'Mushaf Al-Qur\'an Standar PUSDAI Jawa Barat',
                'kategori' => 'Informasi',
                'penulis' => 'Sekretariat PUSDAI',
                'gambar' => 'images/galeri-mushaf.jpeg',
                'ringkasan' => 'Mengenal keistimewaan dan nilai sejarah Mushaf Al-Qur\'an kebanggaan umat Islam Jawa Barat di Pusdai.',
                'isi' => 'Mushaf Al-Qur\'an Standar PUSDAI merupakan hasil kerja bersama ulama dan pemerintah Provinsi Jawa Barat. Mushaf ini menggunakan rasam Utsmani dengan penulisan yang telah diverifikasi, sehingga nyaman digunakan untuk tilawah maupun hafalan. PUSDAI juga menyelenggarakan edukasi dan pameran mushaf bagi masyarakat yang ingin mengenal proses penyusunannya.',
            ],
            [
                'judul' => 'Program Santunan Lansia & Dhuafa Pusdai Care',
                'kategori' => 'Sosial',
                'penulis' => 'Pusdai Care',
                'gambar' => 'images/santunan_jompo2.jpeg',
                'ringkasan' => 'Komitmen PUSDAI dalam mendukung kepedulian sosial kemasyarakatan dan pelayanan terbaik bagi dhuafa.',
                'isi' => 'Melalui program Pusdai Care, PUSDAI menyalurkan santunan bagi lansia dan dhuafa di sekitar Bandung. Program ini bersumber dari zakat, infak, dan sedekah jamaah. Selain santunan rutin, Pusdai Care juga menjalankan khitanan massal dan bantuan pendidikan. Masyarakat yang ingin berpartisipasi dapat menyalurkan donasi melalui halaman Donasi.',
            ],
        ];

        foreach ($items as $item) {
            Article::firstOrCreate(
                ['judul' => $item['judul']],
                [
                    'slug' => Str::slug($item['judul']).'-'.Str::lower(Str::random(4)),
                    'kategori' => $item['kategori'],
                    'penulis' => $item['penulis'],
                    'gambar' => $item['gambar'],
                    'ringkasan' => $item['ringkasan'],
                    'isi' => $item['isi'],
                    'is_published' => true,
                    'published_at' => now()->subDays(3),
                ]
            );
        }
    }
}
