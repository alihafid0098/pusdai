<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class PusdaiController extends Controller
{
    public function beranda()
    {
        return view('beranda');
    }

    public function sejarah()
    {
        return view('pages.sejarah');
    }

    public function profil()
    {
        return view('pages.profil');
    }

    public function layanan()
    {
        return view('pages.layanan');
    }

    public function galeri()
    {
        return view('pages.galeri');
    }

   public function berita()
{
    $berita = Berita::latest('tanggal')->get();

    return view('pages.berita', [
        'berita' => $berita
    ]);
}

    public function agenda()
    {
        return view('pages.agenda');
    }

    public function donasi()
    {
        return view('pages.donasi');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }

    public function konsultasi()
    {
        return view('pages.konsultasi');
    }

    public function faraid()
    {
        return view('pages.faraid');
    }

    public function perpustakaan()
    {
        return view('pages.perpustakaan');
    }
   public function beritaDetail($slug)
{
    $berita = [
        'kegiatan-keislaman-pusdai-jawa-barat' => [
            'judul' => 'Kegiatan Keislaman PUSDAI Jawa Barat',
            'kategori' => 'Kegiatan',
            'tanggal' => '07 Oktober 2026',
            'gambar' => '/images/manasik.png',
            'isi' => 'PUSDAI Jawa Barat terus menyelenggarakan berbagai kegiatan keislaman sebagai bentuk pelayanan kepada masyarakat. Kegiatan tersebut menjadi sarana untuk mempererat silaturahmi dan meningkatkan pemahaman keagamaan.'
        ],

        'kajian-islam-dan-pembinaan-umat' => [
            'judul' => 'Kajian Islam dan Pembinaan Umat',
            'kategori' => 'Kajian',
            'tanggal' => '05 Oktober 2026',
            'gambar' => '/images/pengajian-assalam-di-masjid.jpeg',
            'isi' => 'Kajian Islam merupakan salah satu kegiatan yang memiliki peran penting dalam meningkatkan wawasan keagamaan masyarakat. PUSDAI menghadirkan berbagai kegiatan pembinaan umat secara berkelanjutan.'
        ],

        'informasi-pelayanan-pusdai' => [
            'judul' => 'Informasi Pelayanan PUSDAI Jawa Barat',
            'kategori' => 'Informasi',
            'tanggal' => '02 Oktober 2026',
            'gambar' => '/images/galeri-mushaf.jpeg',
            'isi' => 'PUSDAI Jawa Barat menyediakan berbagai layanan keislaman yang dapat dimanfaatkan oleh masyarakat. Informasi mengenai layanan dapat diperoleh melalui halaman layanan dan kontak PUSDAI.'
        ],

        'semangat-dakwah-masyarakat' => [
            'judul' => 'Membangun Semangat Dakwah di Tengah Masyarakat',
            'kategori' => 'Dakwah',
            'tanggal' => '30 September 2026',
            'gambar' => '/images/santunan_jompo.jpeg',
            'isi' => 'PUSDAI terus mendorong semangat dakwah di tengah masyarakat melalui berbagai kegiatan keagamaan, pembinaan, kajian dan program pelayanan umat.'
        ],

        'pelayanan-sosial-masyarakat' => [
            'judul' => 'PUSDAI dan Pelayanan Sosial Masyarakat',
            'kategori' => 'Sosial',
            'tanggal' => '28 September 2026',
            'gambar' => '/images/khitan_massal.jpeg',
            'isi' => 'Pelayanan sosial merupakan salah satu bentuk kepedulian terhadap masyarakat. PUSDAI berupaya menghadirkan kegiatan yang memberikan manfaat bagi masyarakat.'
        ],

        'pusdai-pusat-dakwah-islam' => [
            'judul' => 'PUSDAI sebagai Pusat Dakwah Islam Jawa Barat',
            'kategori' => 'PUSDAI',
            'tanggal' => '25 September 2026',
            'gambar' => '/images/arsitektur4.jpeg',
            'isi' => 'PUSDAI Jawa Barat merupakan salah satu pusat kegiatan dakwah Islam yang menyediakan berbagai kegiatan keagamaan, pelayanan umat dan fasilitas untuk masyarakat.'
        ],
    ];

    if (!isset($berita[$slug])) {
        abort(404);
    }

    return view('pages.berita-detail', [
        'berita' => $berita[$slug]
    ]);
}
}
