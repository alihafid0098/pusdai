@extends('layouts.app')

@section('title', 'Berita - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="inner-hero-content">
        <span class="hero-badge">BERITA PUSDAI</span>

        <h1>Berita &amp; Artikel</h1>

        <p>
            Kabar kegiatan, kajian, dan program PUSDAI Jawa Barat.
        </p>
    </div>
</section>

<section class="news-section">
    <div class="container">

        @if ($artikel->isEmpty())
            <p class="agenda-empty">
                Belum ada berita yang diterbitkan. Silakan kembali lagi nanti.
            </p>
        @else
            <div class="news-grid">

                @foreach ($artikel as $item)
                    <a href="{{ route('berita.detail', $item->slug) }}" class="news-page-card">
                        <div class="news-page-image">
                            @if ($item->gambar)
                                <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}">
                            @else
                                <span class="news-no-image">PUSDAI</span>
                            @endif
                        </div>

                        <div class="news-page-content">
                            <span class="news-page-category">{{ $item->kategori }}</span>

                            <h3>{{ $item->judul }}</h3>

                            <p>{{ $item->ringkasan ?: \Illuminate\Support\Str::limit(strip_tags($item->isi), 120) }}</p>

                            <span class="news-page-date">
                                {{ $item->published_at?->translatedFormat('d F Y') }}
                            </span>
                        </div>
                    </a>
                @endforeach

            </div>

            <div class="admin-pagination">
                {{ $artikel->links() }}
            </div>
        @endif

    </div>
</section>

@endsection
