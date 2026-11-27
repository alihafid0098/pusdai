<?php

namespace App\Http\Controllers;

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
