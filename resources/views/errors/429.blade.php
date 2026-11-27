@extends('layouts.app')

@section('title', 'Terlalu Banyak Permintaan - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">429</span>

        <h1>Terlalu banyak permintaan</h1>

        <p>
            Anda mengirim permintaan terlalu cepat. Tunggu sebentar,
            lalu coba lagi.
        </p>

        <p style="margin-top: 26px;">
            <a href="{{ route('beranda') }}" class="btn btn-primary">Kembali ke Beranda</a>
        </p>
    </div>
</section>

@endsection
