@extends('layouts.app')

@section('title', $berita->judul . ' - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">

        <span class="hero-badge">
            {{ $berita->kategori }}
        </span>

        <h1>
            {{ $berita->judul }}
        </h1>

    </div>
</section>


<section class="news-detail-section">

    <div class="container">

        <div class="news-detail">

            <a href="{{ route('berita') }}" class="back-news">
                ← Kembali ke Berita
            </a>

            <img
                src="{{ $berita->gambar }}"
                alt="{{ $berita->judul }}"
                class="news-detail-image"
            >

            <div class="news-detail-meta">

                {{ $berita->kategori }}

                &nbsp; • &nbsp;

                {{ $berita->tanggal->format('d M Y') }}

            </div>

            <h1>
                {{ $berita->judul }}
            </h1>

            <div class="news-detail-text">

                <p>
                    {{ $berita->isi }}
                </p>

                <p>
                    PUSDAI Jawa Barat berkomitmen untuk terus menghadirkan
                    kegiatan yang memberikan manfaat bagi masyarakat serta
                    mendukung pengembangan dakwah Islam di Jawa Barat.
                </p>

            </div>

        </div>

    </div>

</section>

@endsection