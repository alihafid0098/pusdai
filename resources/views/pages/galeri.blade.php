@extends('layouts.app')

@section('title', 'Galeri Foto - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="inner-hero-content">
        <span class="section-label">DOKUMENTASI</span>

        <h1>Galeri Foto</h1>

        <p>
            Dokumentasi kegiatan, fasilitas, dan berbagai aktivitas
            PUSDAI Jawa Barat.
        </p>
    </div>
</section>

<section class="gallery-section">
    <div class="container">

        <div class="section-heading center">
            <span class="section-label">GALERI PUSDAI</span>

            <h2>Dokumentasi Kegiatan</h2>

            <p>
                Lihat berbagai kegiatan dan aktivitas yang
                diselenggarakan di PUSDAI Jawa Barat.
            </p>
        </div>

        @if ($galleries->isEmpty())
            <p class="agenda-empty">
                Belum ada foto yang diunggah. Silakan hubungi sekretariat
                PUSDAI untuk dokumentasi kegiatan.
            </p>
        @else
            <div class="gallery-grid">

                @foreach ($galleries as $item)
                    <div class="gallery-item {{ $loop->first ? 'gallery-large' : '' }}">
                        <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}">

                        <div class="gallery-overlay">
                            <span>{{ $item->judul }}</span>
                        </div>
                    </div>
                @endforeach

            </div>
        @endif

    </div>
</section>

@endsection
