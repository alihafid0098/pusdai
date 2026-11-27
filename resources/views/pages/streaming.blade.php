@extends('layouts.app')

@section('title', 'Pusdai TV & Podcast - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">MEDIA SYIAR UMAT</span>

        <h1>Pusdai TV &amp; Podcast Kajian</h1>

        <p>
            Saksikan siaran langsung dakwah Masjid Raya Pusdai Jawa Barat atau
            dengarkan rekaman audio tausiyah terpilih dari asatidzah kapan saja.
        </p>
    </div>
</section>

<section class="services-page-section">
    <div class="container">

        <div class="section-heading center">
            <span class="section-label">LIVE STREAMING</span>

            <h2>Saluran Resmi Pusdai TV</h2>

            <p>
                Siaran kajian dan kegiatan masjid ditayangkan melalui kanal
                YouTube resmi PUSDAI Jawa Barat.
            </p>
        </div>

        <div class="stream-live">

            @if (config('services.youtube.live_embed'))
                <div class="stream-frame">
                    <iframe
                        src="{{ config('services.youtube.live_embed') }}"
                        title="Pusdai TV - siaran langsung"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        loading="lazy"
                    ></iframe>
                </div>
            @else
                <div class="stream-placeholder">
                    <span class="stream-icon">▶</span>
                    <h3>Mulai tonton siaran langsung</h3>
                    <p>
                        Saluran live dibuka di YouTube agar kualitas tetap stabil
                        dan bisa diputar di semua perangkat.
                    </p>
                    <a
                        class="btn btn-primary"
                        href="https://www.youtube.com/@pusdaijabar/live"
                        target="_blank"
                        rel="noopener"
                    >
                        Buka Pusdai TV
                    </a>
                </div>
            @endif

        </div>

        <div class="stream-podcast">

            <div class="stream-podcast-copy">
                <span class="section-label">PODCAST KAJIAN</span>
                <h2>Dengarkan Tausiyah</h2>
                <p>
                    Rekaman kajian dan tausiyah asatidzah Pusdai Jabar akan
                    ditambahkan bertahap di halaman ini.
                </p>
            </div>

            <div class="stream-empty">
                <strong>Pustaka audio belum tersedia</strong>
                <p>
                    Belum ada berkas rekaman yang diunggah. Sementara itu,
                    semua rekaman bisa disimak di kanal YouTube resmi.
                </p>
                <a href="https://www.youtube.com/@pusdaijabar" target="_blank" rel="noopener">
                    Buka kanal YouTube →
                </a>
            </div>

        </div>

        <div class="stream-visual">
            <div>
                <span class="section-label">JELAJAHI</span>
                <h2>Masjid PUSDAI Jabar Secara Visual</h2>
                <p>
                    Saksikan keindahan arsitektur eklektik bernuansa Timur
                    Tengah, Turki, dan ornamen lokal Sunda (atap limas), serta
                    ragam aktivitas syiar keumatan di Islamic Center pertama
                    Jawa Barat.
                </p>
                <a href="{{ route('galeri') }}" class="btn btn-primary">Lihat Galeri</a>
            </div>
        </div>

    </div>
</section>

@endsection
