@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">404</span>

        <h1>Halaman tidak ditemukan</h1>

        <p>
            Alamat yang Anda buka tidak tersedia atau sudah dipindahkan.
            Silakan kembali ke beranda atau gunakan menu di atas.
        </p>

        <p style="margin-top: 26px;">
            <a href="{{ route('beranda') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </p>
    </div>
</section>

@endsection
