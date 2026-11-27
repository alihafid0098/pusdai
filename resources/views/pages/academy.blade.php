@extends('layouts.app')

@section('title', 'Pusdai Academy - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">TUNTUT ILMU SYAR'I</span>

        <h1>Pusdai Academy</h1>

        <p>
            Program kelas belajar keislaman terstruktur dibimbing langsung oleh
            dewan asatidzah DKM Masjid Raya Pusdai Jawa Barat. Tingkatkan
            pemahaman ibadah Anda.
        </p>
    </div>
</section>

<section class="services-page-section">
    <div class="container">

        <div class="section-heading center">
            <span class="section-label">PROGRAM</span>

            <h2>Kelas Keislaman Terstruktur</h2>

            <p>
                Kelas dibuka secara berkala dengan kurikulum bertahap, materi
                ringkas, dan bimbingan langsung dari asatidzah.
            </p>
        </div>

        <div class="academy-grid">

            <div class="service-page-card">
                <div class="service-page-icon">📖</div>
                <div class="service-page-content">
                    <h3>Tahsin &amp; Tajwid</h3>
                    <p>
                        Perbaikan bacaan Al-Qur'an secara bertahap, dari makhraj
                        huruf sampai kaidah tajwid dasar.
                    </p>
                </div>
            </div>

            <div class="service-page-card">
                <div class="service-page-icon">🕌</div>
                <div class="service-page-content">
                    <h3>Fiqih Ibadah</h3>
                    <p>
                        Panduan praktis ibadah harian: bersuci, shalat, puasa,
                        zakat, dan ibadah lainnya sesuai tuntunan syariat.
                    </p>
                </div>
            </div>

            <div class="service-page-card">
                <div class="service-page-icon">📚</div>
                <div class="service-page-content">
                    <h3>Kajian Kitab</h3>
                    <p>
                        Pembacaan dan pembahasan kitab kuning bersama asatidzah,
                        untuk memperdalam pemahaman ilmu keislaman.
                    </p>
                </div>
            </div>

        </div>

        <div class="academy-empty">
            <strong>Belum ada kelas aktif</strong>
            <p>
                Saat ini belum ada program kelas terbuka. Nantikan info
                pembukaan angkatan baru lewat halaman Agenda dan media sosial
                PUSDAI.
            </p>
            <a href="{{ route('agenda') }}" class="btn btn-primary">Lihat Agenda</a>
        </div>

    </div>
</section>

@endsection
