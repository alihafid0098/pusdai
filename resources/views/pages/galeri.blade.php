@extends('layouts.app')

@section('title', 'Galeri Foto - PUSDAI Jawa Barat')

@section('content')

{{-- HERO --}}

<section class="inner-hero">


<div class="inner-hero-overlay"></div>

<div class="inner-hero-content">

    <span class="section-label">
        DOKUMENTASI
    </span>

    <h1>Galeri Foto</h1>

    <p>
        Dokumentasi kegiatan, fasilitas, dan berbagai aktivitas
        PUSDAI Jawa Barat.
    </p>

</div>


</section>

{{-- GALERI --}}

<section class="gallery-section">


<div class="container">

    <div class="section-heading center">

        <span class="section-label">
            GALERI PUSDAI
        </span>

        <h2>
            Dokumentasi Kegiatan
        </h2>

        <p>
            Lihat berbagai kegiatan dan aktivitas yang
            diselenggarakan di PUSDAI Jawa Barat.
        </p>

    </div>


    <div class="gallery-grid">

        <div class="gallery-item gallery-large">
            <img
                src="{{ asset('images/arsitektur1.jpeg') }}"
                alt="Arsitektur Utama Masjid PUSDAI Jawa Barat"
            >

            <div class="gallery-overlay">
                <span>Arsitektur Utama Masjid PUSDAI</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="{{ asset('images/galeri-mushaf.jpeg') }}"
                alt="Mushaf Al-Qur'an Standar Pusdai"
            >

            <div class="gallery-overlay">
                <span>Mushaf Al-Qur'an Pusdai Jabar</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="{{ asset('images/galeri-manasik.png') }}"
                alt="Bimbingan Manasik Haji & Umrah"
            >

            <div class="gallery-overlay">
                <span>Bimbingan Manasik Haji & Umrah</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="{{ asset('images/galeri-perpustakaan.jpeg') }}"
                alt="Perpustakaan Digital PUSDAI"
            >

            <div class="gallery-overlay">
                <span>Perpustakaan Digital PUSDAI</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="{{ asset('images/pengajian-assalam-di-masjid.jpeg') }}"
                alt="Pengajian Majelis Assalam"
            >

            <div class="gallery-overlay">
                <span>Kajian Rutin Majelis Assalam</span>
            </div>
        </div>


        <div class="gallery-item gallery-wide">
            <img
                src="{{ asset('images/arsitektur2.jpeg') }}"
                alt="Kemegahan Kawasan Masjid Pusdai"
            >

            <div class="gallery-overlay">
                <span>Kemegahan Lanskap Masjid PUSDAI</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="{{ asset('images/khitan_massal1.jpeg') }}"
                alt="Bakti Sosial Khitanan Massal"
            >

            <div class="gallery-overlay">
                <span>Bakti Sosial Khitanan Massal</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="{{ asset('images/santunan_jompo2.jpeg') }}"
                alt="Santunan Lansia & Dhuafa"
            >

            <div class="gallery-overlay">
                <span>Santunan Pusdai Peduli Dhuafa</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="{{ asset('images/pengajian-IPHI-masjid.jpeg') }}"
                alt="Pengajian IPHI Jawa Barat"
            >

            <div class="gallery-overlay">
                <span>Pengajian Akbar IPHI Jabar</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="{{ asset('images/kunjungan-mushaf.jpeg') }}"
                alt="Kunjungan & Edukasi Mushaf Pusdai"
            >

            <div class="gallery-overlay">
                <span>Edukasi & Pameran Mushaf</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="{{ asset('images/arsitektur3.jpeg') }}"
                alt="Fasilitas & Koridor Masjid"
            >

            <div class="gallery-overlay">
                <span>Fasilitas & Selasar Masjid</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="{{ asset('images/pengajian_persistri.jpeg') }}"
                alt="Kajian Persistri Jawa Barat"
            >

            <div class="gallery-overlay">
                <span>Kajian Jama'ah Persistri</span>
            </div>
        </div>

    </div>

</div>


</section>

{{-- CTA --}}

<section class="history-cta">


<div class="container">

    <div class="history-cta-box">

        <div>

            <span class="section-label">
                PUSDAI JAWA BARAT
            </span>

            <h2>
                Ikuti Berbagai Kegiatan PUSDAI
            </h2>

            <p>
                Temukan berbagai layanan dan agenda kegiatan
                yang tersedia untuk masyarakat.
            </p>

        </div>

        <a href="{{ route('agenda') }}" class="btn btn-primary">
            Lihat Agenda →
        </a>

    </div>

</div>


</section>

@endsection
