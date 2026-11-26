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
            'gambar' => 'https://images.pexels.com/photos/724921/pexels-photo-724921.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'isi' => 'PUSDAI Jawa Barat terus menyelenggarakan berbagai kegiatan keislaman sebagai bentuk pelayanan kepada masyarakat. Kegiatan tersebut menjadi sarana untuk mempererat silaturahmi dan meningkatkan pemahaman keagamaan.'
        ],

        'kajian-islam-dan-pembinaan-umat' => [
            'judul' => 'Kajian Islam dan Pembinaan Umat',
            'kategori' => 'Kajian',
            'tanggal' => '05 Oktober 2026',
            'gambar' => 'https://images.pexels.com/photos/161439/pexels-photo-161439.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'isi' => 'Kajian Islam merupakan salah satu kegiatan yang memiliki peran penting dalam meningkatkan wawasan keagamaan masyarakat. PUSDAI menghadirkan berbagai kegiatan pembinaan umat secara berkelanjutan.'
        ],

        'informasi-pelayanan-pusdai' => [
            'judul' => 'Informasi Pelayanan PUSDAI Jawa Barat',
            'kategori' => 'Informasi',
            'tanggal' => '02 Oktober 2026',
            'gambar' => 'https://images.pexels.com/photos/4608024/pexels-photo-4608024.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'isi' => 'PUSDAI Jawa Barat menyediakan berbagai layanan keislaman yang dapat dimanfaatkan oleh masyarakat. Informasi mengenai layanan dapat diperoleh melalui halaman layanan dan kontak PUSDAI.'
        ],

        'semangat-dakwah-masyarakat' => [
            'judul' => 'Membangun Semangat Dakwah di Tengah Masyarakat',
            'kategori' => 'Dakwah',
            'tanggal' => '30 September 2026',
            'gambar' => 'https://images.pexels.com/photos/3889858/pexels-photo-3889858.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'isi' => 'PUSDAI terus mendorong semangat dakwah di tengah masyarakat melalui berbagai kegiatan keagamaan, pembinaan, kajian dan program pelayanan umat.'
        ],

        'pelayanan-sosial-masyarakat' => [
            'judul' => 'PUSDAI dan Pelayanan Sosial Masyarakat',
            'kategori' => 'Sosial',
            'tanggal' => '28 September 2026',
            'gambar' => 'https://images.pexels.com/photos/6069534/pexels-photo-6069534.jpeg?auto=compress&cs=tinysrgb&w=1200',
            'isi' => 'Pelayanan sosial merupakan salah satu bentuk kepedulian terhadap masyarakat. PUSDAI berupaya menghadirkan kegiatan yang memberikan manfaat bagi masyarakat.'
        ],

        'pusdai-pusat-dakwah-islam' => [
            'judul' => 'PUSDAI sebagai Pusat Dakwah Islam Jawa Barat',
            'kategori' => 'PUSDAI',
            'tanggal' => '25 September 2026',
            'gambar' => 'https://images.pexels.com/photos/8814825/pexels-photo-8814825.jpeg?auto=compress&cs=tinysrgb&w=1200',
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
