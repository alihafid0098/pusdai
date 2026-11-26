@extends('layouts.app')

@section('title', 'Donasi - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

```
<div class="container inner-hero-content">
    <span class="hero-badge">PUSDAI CARE</span>

    <h1>Donasi & Kepedulian</h1>

    <p>
        Bersama membantu menghadirkan manfaat dan kebaikan
        bagi masyarakat melalui program PUSDAI Jawa Barat.
    </p>
</div>
```

</section>

<section class="donation-page-section">

```
<div class="container">

    <div class="section-heading center">
        <span class="section-label">PUSDAI CARE</span>

        <h2>
            Salurkan Kepedulian Anda
        </h2>

        <p>
            Dukungan Anda dapat membantu berbagai kegiatan dakwah,
            sosial, pendidikan, dan pelayanan umat.
        </p>
    </div>


    <div class="donation-page-grid">

        {{-- ZIS --}}
        <div class="donation-card">

            <div class="donation-icon">
                🤲
            </div>

            <h3>
                Zakat, Infak & Sedekah
            </h3>

            <p>
                Salurkan zakat, infak, dan sedekah untuk membantu
                masyarakat serta mendukung berbagai program keumatan.
            </p>

            <a href="{{ route('kontak') }}">
                Informasi Selengkapnya →
            </a>

        </div>


        {{-- Zakat Maal --}}
        <div class="donation-card">

            <div class="donation-icon">
                💰
            </div>

            <h3>
                Zakat Maal
            </h3>

            <p>
                Tunaikan zakat maal melalui layanan PUSDAI dan ikut
                berkontribusi dalam membantu masyarakat yang membutuhkan.
            </p>

            <a href="{{ route('kontak') }}">
                Informasi Selengkapnya →
            </a>

        </div>


        {{-- Wakaf --}}
        <div class="donation-card">

            <div class="donation-icon">
                🕌
            </div>

            <h3>
                Wakaf
            </h3>

            <p>
                Dukung pembangunan dan pengembangan fasilitas umat
                melalui program wakaf yang bermanfaat secara berkelanjutan.
            </p>

            <a href="{{ route('kontak') }}">
                Informasi Selengkapnya →
            </a>

        </div>

    </div>

</div>
```

</section>

<section class="donation-method-section">

```
<div class="container">

    <div class="donation-method-box">

        <div class="donation-method-content">

            <span class="section-label">
                CARA BERDONASI
            </span>

            <h2>
                Donasi dengan Mudah
            </h2>

            <p>
                Untuk mendapatkan informasi rekening resmi dan tata cara
                penyaluran donasi, silakan menghubungi PUSDAI Jawa Barat.
            </p>

            <div class="donation-steps">

                <div class="donation-step">
                    <span>01</span>
                    <div>
                        <h4>Pilih Program</h4>
                        <p>
                            Tentukan program atau bentuk donasi
                            yang ingin Anda salurkan.
                        </p>
                    </div>
                </div>

                <div class="donation-step">
                    <span>02</span>
                    <div>
                        <h4>Hubungi PUSDAI</h4>
                        <p>
                            Dapatkan informasi rekening dan
                            prosedur donasi resmi.
                        </p>
                    </div>
                </div>

                <div class="donation-step">
                    <span>03</span>
                    <div>
                        <h4>Salurkan Donasi</h4>
                        <p>
                            Salurkan donasi sesuai informasi
                            yang diberikan oleh PUSDAI.
                        </p>
                    </div>
                </div>

            </div>

            <a href="{{ route('kontak') }}" class="donation-button">
                Hubungi PUSDAI
            </a>

        </div>


        <div class="donation-visual">

            <div class="donation-visual-circle">
                🤲
            </div>

            <h3>
                Berbagi Kebaikan
            </h3>

            <p>
                Setiap kebaikan yang diberikan dapat menjadi
                manfaat bagi sesama.
            </p>

        </div>

    </div>

</div>
```

</section>

<section class="donation-contact-section">

```
<div class="container">

    <div class="donation-contact">

        <h2>
            Ingin mengetahui informasi donasi?
        </h2>

        <p>
            Hubungi PUSDAI Jawa Barat untuk mendapatkan informasi
            mengenai program dan tata cara donasi.
        </p>

        <a href="{{ route('kontak') }}" class="primary-button">
            Hubungi Kami
        </a>

    </div>

</div>
```

</section>

@endsection
