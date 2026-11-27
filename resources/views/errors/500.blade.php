@extends('layouts.app')

@section('title', 'Terjadi Kendala - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">500</span>

        <h1>Terjadi kendala pada server</h1>

        <p>
            Kami sedang memperbaikinya. Silakan coba beberapa saat lagi
            atau hubungi sekretariat PUSDAI bila perlu.
        </p>

        <p style="margin-top: 26px;">
            <a href="{{ route('beranda') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </p>
    </div>
</section>

@endsection
