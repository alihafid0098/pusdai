<?php

namespace App\Http\Controllers;

class PusdaiController extends Controller
{
    public function beranda()
    {
        $announcements = \App\Models\Announcement::where('is_active', true)
            ->latest()
            ->take(3)
            ->get();

        $beritaTerbaru = \App\Models\Article::terbit()
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('beranda', compact('announcements', 'beritaTerbaru'));
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

    public function sewa()
    {
        return view('pages.sewa');
    }

    public function jenazah()
    {
        return view('pages.jenazah');
    }

    public function streaming()
    {
        return view('pages.streaming');
    }

    public function academy()
    {
        return view('pages.academy');
    }

    public function galeri()
    {
        $galleries = \App\Models\Gallery::orderBy('urutan')->latest('id')->get();

        return view('pages.galeri', compact('galleries'));
    }

    public function berita()
    {
        $artikel = \App\Models\Article::terbit()
            ->latest('published_at')
            ->paginate(9);

        return view('pages.berita', compact('artikel'));
    }

    public function beritaDetail($slug)
    {
        $article = \App\Models\Article::terbit()->where('slug', $slug)->firstOrFail();

        $lainnya = \App\Models\Article::terbit()
            ->where('id', '!=', $article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('pages.berita-detail', compact('article', 'lainnya'));
    }

    public function agenda()
    {
        $urutanHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Ahad'];

        $kajianRutin = \App\Models\Agenda::rutin()
            ->terbit()
            ->get()
            ->sortBy(fn ($item) => array_search($item->hari, $urutanHari, true) === false ? 99 : array_search($item->hari, $urutanHari, true))
            ->values();

        $kegiatan = \App\Models\Agenda::kegiatan()
            ->terbit()
            ->orderByRaw('tanggal IS NULL')
            ->orderBy('tanggal')
            ->get();

        return view('pages.agenda', compact('kajianRutin', 'kegiatan'));
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

    public function sitemap()
    {
        $routes = [
            'beranda',
            'sejarah',
            'profil',
            'layanan',
            'layanan.sewa',
            'layanan.jenazah',
            'streaming',
            'academy',
            'galeri',
            'agenda',
            'donasi',
            'kontak',
            'konsultasi',
            'faraid',
            'perpustakaan',
        ];

        $urls = collect($routes)->map(fn ($name) => [
            'loc' => route($name),
            'lastmod' => now()->toDateString(),
        ]);

        return response()
            ->view('sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml');
    }

    public function perpustakaan()
    {
        return view('pages.perpustakaan');
    }
}
