@extends('layouts.app')

@section('title', $article->judul.' - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="inner-hero-content">
        <span class="hero-badge">{{ $article->kategori }}</span>

        <h1>{{ $article->judul }}</h1>

        <p>
            {{ $article->published_at?->translatedFormat('d F Y') }}
            @if ($article->penulis)
                • {{ $article->penulis }}
            @endif
        </p>
    </div>
</section>

<section class="article-section">
    <div class="container article-container">

        @if ($article->gambar)
            <img class="article-image" src="{{ $article->gambar_url }}" alt="{{ $article->judul }}">
        @endif

        @if ($article->ringkasan)
            <p class="article-lead">{{ $article->ringkasan }}</p>
        @endif

        <div class="article-body">
            {!! nl2br(e($article->isi)) !!}
        </div>

        <a href="{{ route('berita') }}" class="article-back">← Kembali ke daftar berita</a>

        @if ($lainnya->isNotEmpty())
            <div class="article-related">
                <h2>Berita Lainnya</h2>

                <div class="news-grid">
                    @foreach ($lainnya as $item)
                        <a href="{{ route('berita.detail', $item->slug) }}" class="news-page-card">
                            <div class="news-page-content">
                                <span class="news-page-category">{{ $item->kategori }}</span>
                                <h3>{{ $item->judul }}</h3>
                                <span class="news-page-date">{{ $item->published_at?->translatedFormat('d F Y') }}</span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>

@endsection
