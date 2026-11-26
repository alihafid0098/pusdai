@extends('layouts.app')

@section('title', 'Galeri Foto - PUSDAI Jawa Barat')

@section('content')

{{-- HERO --}}

<section class="inner-hero">

```
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
```

</section>

{{-- GALERI --}}

<section class="gallery-section">

```
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
                src="https://images.pexels.com/photos/32119558/pexels-photo-32119558.jpeg?auto=compress&cs=tinysrgb&w=1200"
                alt="Masjid PUSDAI Jawa Barat"
            >

            <div class="gallery-overlay">
                <span>Masjid PUSDAI Jawa Barat</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="https://images.pexels.com/photos/13249053/pexels-photo-13249053.jpeg?auto=compress&cs=tinysrgb&w=800"
                alt="Kegiatan Keislaman"
            >

            <div class="gallery-overlay">
                <span>Kegiatan Keislaman</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="https://images.pexels.com/photos/724921/pexels-photo-724921.jpeg?auto=compress&cs=tinysrgb&w=800"
                alt="Kajian Islam"
            >

            <div class="gallery-overlay">
                <span>Kajian Islam</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="https://images.pexels.com/photos/161439/islamic-mosque-religion-muslim-161439.jpeg?auto=compress&cs=tinysrgb&w=800"
                alt="Masjid"
            >

            <div class="gallery-overlay">
                <span>Aktivitas Masjid</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="https://images.pexels.com/photos/4608024/pexels-photo-4608024.jpeg?auto=compress&cs=tinysrgb&w=800"
                alt="Seminar Islam"
            >

            <div class="gallery-overlay">
                <span>Seminar Islam</span>
            </div>
        </div>


        <div class="gallery-item gallery-wide">
            <img
                src="https://images.pexels.com/photos/3889858/pexels-photo-3889858.jpeg?auto=compress&cs=tinysrgb&w=1200"
                alt="Pendidikan Islam"
            >

            <div class="gallery-overlay">
                <span>Pendidikan Islam</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="https://images.pexels.com/photos/6069534/pexels-photo-6069534.jpeg?auto=compress&cs=tinysrgb&w=800"
                alt="Kegiatan Masyarakat"
            >

            <div class="gallery-overlay">
                <span>Kegiatan Masyarakat</span>
            </div>
        </div>


        <div class="gallery-item">
            <img
                src="https://images.pexels.com/photos/8814825/pexels-photo-8814825.jpeg?auto=compress&cs=tinysrgb&w=800"
                alt="Kegiatan Dakwah"
            >

            <div class="gallery-overlay">
                <span>Kegiatan Dakwah</span>
            </div>
        </div>

    </div>

</div>
```

</section>

{{-- CTA --}}

<section class="history-cta">

```
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
```

</section>

@endsection
