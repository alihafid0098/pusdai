@extends('layouts.app')

@section('title', 'Agenda - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">AGENDA PUSDAI</span>

        <h1>Agenda & Kegiatan</h1>

        <p>
            Informasi berbagai kegiatan, kajian, seminar, dan agenda
            keislaman yang diselenggarakan PUSDAI Jawa Barat.
        </p>
    </div>
</section>


<section class="agenda-page-section">
    <div class="container">

        <div class="section-heading center">
            <span class="section-label">AGENDA KEGIATAN</span>

            <h2>
                Kegiatan PUSDAI
            </h2>

            <p>
                Temukan berbagai kegiatan keislaman dan program pembinaan
                umat yang akan dilaksanakan di PUSDAI Jawa Barat.
            </p>
        </div>


        <div class="agenda-list">

            {{-- Agenda 1 --}}
            <div class="agenda-card">

                <div class="agenda-date">
                    <span class="agenda-day">12</span>
                    <span class="agenda-month">OKT</span>
                    <span class="agenda-year">2026</span>
                </div>

                <div class="agenda-content">

                    <span class="agenda-category">
                        Kajian
                    </span>

                    <h3>
                        Kajian Islam dan Pembinaan Umat
                    </h3>

                    <p>
                        Kajian keislaman untuk meningkatkan pemahaman
                        dan wawasan masyarakat mengenai ajaran Islam.
                    </p>

                    <div class="agenda-info">
                        <span>🕐 08.00 - 10.00 WIB</span>
                        <span>📍 PUSDAI Jawa Barat</span>
                    </div>

                </div>

            </div>


            {{-- Agenda 2 --}}
            <div class="agenda-card">

                <div class="agenda-date">
                    <span class="agenda-day">18</span>
                    <span class="agenda-month">OKT</span>
                    <span class="agenda-year">2026</span>
                </div>

                <div class="agenda-content">

                    <span class="agenda-category">
                        Seminar
                    </span>

                    <h3>
                        Seminar Keislaman
                    </h3>

                    <p>
                        Kegiatan seminar yang menghadirkan pembahasan
                        mengenai kehidupan Islam di tengah masyarakat.
                    </p>

                    <div class="agenda-info">
                        <span>🕐 09.00 - 12.00 WIB</span>
                        <span>📍 Aula PUSDAI</span>
                    </div>

                </div>

            </div>


            {{-- Agenda 3 --}}
            <div class="agenda-card">

                <div class="agenda-date">
                    <span class="agenda-day">25</span>
                    <span class="agenda-month">OKT</span>
                    <span class="agenda-year">2026</span>
                </div>

                <div class="agenda-content">

                    <span class="agenda-category">
                        Sosial
                    </span>

                    <h3>
                        Kegiatan Sosial dan Pelayanan Umat
                    </h3>

                    <p>
                        Kegiatan sosial sebagai bentuk kepedulian dan
                        pelayanan PUSDAI kepada masyarakat.
                    </p>

                    <div class="agenda-info">
                        <span>🕐 08.00 - Selesai</span>
                        <span>📍 PUSDAI Jawa Barat</span>
                    </div>

                </div>

            </div>


            {{-- Agenda 4 --}}
            <div class="agenda-card">

                <div class="agenda-date">
                    <span class="agenda-day">01</span>
                    <span class="agenda-month">NOV</span>
                    <span class="agenda-year">2026</span>
                </div>

                <div class="agenda-content">

                    <span class="agenda-category">
                        Dakwah
                    </span>

                    <h3>
                        Tabligh dan Dakwah Islam
                    </h3>

                    <p>
                        Kegiatan dakwah dan tausiyah untuk mempererat
                        ukhuwah serta meningkatkan keimanan masyarakat.
                    </p>

                    <div class="agenda-info">
                        <span>🕐 19.00 - 21.00 WIB</span>
                        <span>📍 Masjid PUSDAI</span>
                    </div>

                </div>

            </div>

        </div>

    </div>
</section>


<section class="agenda-cta-section">

    <div class="container">

        <div class="agenda-cta">

            <div>
                <span class="section-label">
                    INFORMASI KEGIATAN
                </span>

                <h2>
                    Ingin mengetahui agenda lainnya?
                </h2>

                <p>
                    Hubungi PUSDAI Jawa Barat untuk mendapatkan informasi
                    lebih lanjut mengenai kegiatan dan program yang tersedia.
                </p>
            </div>

            <a href="{{ route('kontak') }}" class="primary-button">
                Hubungi Kami
            </a>

        </div>

    </div>

</section>

@endsection