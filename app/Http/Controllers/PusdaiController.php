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

        return view('beranda', compact('announcements'));
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
        return view('pages.galeri');
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
