@extends('layouts.app')

@section('title', 'Sejarah PUSDAI Jawa Barat')

@section('content')

{{-- PAGE HERO --}}

<section class="inner-hero">

```
<div class="inner-hero-overlay"></div>

<div class="inner-hero-content">

    <span class="section-label">
        TENTANG KAMI
    </span>

    <h1>Sejarah PUSDAI Jawa Barat</h1>

    <p>
        Mengenal perjalanan Pusat Dakwah Islam Jawa Barat
        dalam membangun dan melayani umat.
    </p>

</div>
```

</section>

{{-- SEJARAH --}}

<section class="history-section">

```
<div class="container">

    <div class="history-grid">

        <div class="history-image">

            <img
                src="https://images.pexels.com/photos/13249053/pexels-photo-13249053.jpeg?auto=compress&cs=tinysrgb&w=1200"
                alt="PUSDAI Jawa Barat"
            >

            <div class="history-year">
                <strong>1982</strong>
                <span>Awal Perjalanan</span>
            </div>

        </div>


        <div class="history-content">

            <span class="section-label">
                SEJARAH
            </span>

            <h2>
                Perjalanan PUSDAI Jawa Barat
            </h2>

            <p>
                Pusat Dakwah Islam atau PUSDAI Jawa Barat merupakan
                salah satu pusat kegiatan keislaman yang berada di
                Kota Bandung. Kehadirannya menjadi bagian penting
                dalam perkembangan dakwah Islam di Jawa Barat.
            </p>

            <p>
                PUSDAI dikembangkan sebagai pusat kegiatan dakwah,
                pendidikan, kajian Islam, pembinaan umat, serta
                berbagai kegiatan sosial dan keagamaan.
            </p>

            <p>
                Seiring perkembangan zaman, PUSDAI terus berupaya
                memberikan pelayanan kepada masyarakat melalui
                berbagai program dan kegiatan yang sesuai dengan
                kebutuhan umat.
            </p>

        </div>

    </div>

</div>
```

</section>

{{-- NILAI --}}

<section class="history-values">

```
<div class="container">

    <div class="section-heading center">

        <span class="section-label">
            PERAN PUSDAI
        </span>

        <h2>
            Pusat Dakwah dan Pembinaan Umat
        </h2>

        <p>
            PUSDAI hadir sebagai ruang bagi masyarakat untuk
            belajar, beribadah, berdakwah, dan membangun
            kehidupan sosial yang lebih baik.
        </p>

    </div>


    <div class="values-grid">

        <div class="value-card">

            <div class="value-icon">🕌</div>

            <h3>Dakwah</h3>

            <p>
                Menjadi pusat kegiatan dakwah dan penyebaran
                nilai-nilai Islam kepada masyarakat.
            </p>

        </div>


        <div class="value-card">

            <div class="value-icon">📚</div>

            <h3>Pendidikan</h3>

            <p>
                Mendukung kegiatan pendidikan dan pembelajaran
                Islam bagi masyarakat.
            </p>

        </div>


        <div class="value-card">

            <div class="value-icon">🤝</div>

            <h3>Pelayanan Umat</h3>

            <p>
                Memberikan berbagai layanan keagamaan dan sosial
                untuk memenuhi kebutuhan masyarakat.
            </p>

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
                Mari Mengenal Lebih Dekat PUSDAI
            </h2>

            <p>
                Temukan berbagai layanan dan kegiatan yang
                tersedia untuk masyarakat.
            </p>

        </div>

        <a href="{{ route('layanan') }}" class="btn btn-primary">
            Lihat Layanan →
        </a>

    </div>

</div>
```

</section>

@endsection
