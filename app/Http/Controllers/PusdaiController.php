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

    public function perpustakaan()
    {
        return view('pages.perpustakaan');
    }
}
