@extends('layouts.app')

@section('title', 'Layanan - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">LAYANAN PUSDAI</span>

        <h1>
            Layanan untuk Umat
        </h1>

        <p>
            Berbagai layanan keislaman dan fasilitas yang disediakan
            PUSDAI Jawa Barat untuk mendukung kebutuhan masyarakat.
        </p>
    </div>
</section>


<section class="services-page-section">
    <div class="container">

        <div class="section-heading center">
            <span class="section-label">LAYANAN KAMI</span>

            <h2>
                Melayani dengan Amanah
            </h2>

            <p>
                PUSDAI Jawa Barat menyediakan berbagai layanan keagamaan,
                pendidikan, konsultasi, dan fasilitas untuk masyarakat.
            </p>
        </div>


        <div class="services-page-grid">

            {{-- Layanan Akad Nikah --}}
            <div class="service-page-card">
                <div class="service-page-icon">
                    💍
                </div>

                <div class="service-page-content">
                    <h3>Layanan Akad Nikah</h3>

                    <p>
                        Fasilitas dan layanan untuk pelaksanaan akad nikah
                        dengan suasana yang nyaman dan Islami.
                    </p>

                    <a href="{{ route('kontak') }}">
                        Informasi Layanan →
                    </a>
                </div>
            </div>


            {{-- Pembinaan Mualaf --}}
            <div class="service-page-card">
                <div class="service-page-icon">
                    🤲
                </div>

                <div class="service-page-content">
                    <h3>Pembinaan Mualaf</h3>

                    <p>
                        Pendampingan dan pembinaan bagi saudara muslim
                        yang baru memeluk agama Islam.
                    </p>

                    <a href="{{ route('kontak') }}">
                        Informasi Layanan →
                    </a>
                </div>
            </div>


            {{-- Perpustakaan --}}
            <div class="service-page-card">
                <div class="service-page-icon">
                    📚
                </div>

                <div class="service-page-content">
                    <h3>Perpustakaan PUSDAI</h3>

                    <p>
                        Sarana literasi Islam yang menyediakan berbagai
                        koleksi buku dan referensi keislaman.
                    </p>

                    <a href="{{ route('perpustakaan') }}">
                        Kunjungi Perpustakaan →
                    </a>
                </div>
            </div>


            {{-- KBIHU --}}
            <div class="service-page-card">
                <div class="service-page-icon">
                    🕋
                </div>

                <div class="service-page-content">
                    <h3>KBIHU Haji & Umrah</h3>

                    <p>
                        Layanan bimbingan dan pembinaan bagi masyarakat
                        yang akan melaksanakan ibadah haji dan umrah.
                    </p>

                    <a href="{{ route('kontak') }}">
                        Informasi Layanan →
                    </a>
                </div>
            </div>


            {{-- Seminar --}}
            <div class="service-page-card">
                <div class="service-page-icon">
                    🎓
                </div>

                <div class="service-page-content">
                    <h3>Seminar & Kajian Islam</h3>

                    <p>
                        Berbagai kegiatan kajian, seminar, dan pembelajaran
                        Islam untuk meningkatkan wawasan keagamaan masyarakat.
                    </p>

                    <a href="{{ route('agenda') }}">
                        Lihat Agenda →
                    </a>
                </div>
            </div>


            {{-- Layanan Jenazah --}}
            <div class="service-page-card">
                <div class="service-page-icon">
                    🕌
                </div>

                <div class="service-page-content">
                    <h3>Layanan Jenazah</h3>

                    <p>
                        Fasilitas dan pendampingan dalam proses pengurusan
                        jenazah sesuai dengan tuntunan syariat Islam.
                    </p>

                    <a href="{{ route('kontak') }}">
                        Hubungi Kami →
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


<section class="service-info-section">
    <div class="container">

        <div class="service-info-box">

            <div>
                <span class="section-label">BUTUH INFORMASI?</span>

                <h2>
                    Kami siap membantu kebutuhan Anda
                </h2>

                <p>
                    Untuk informasi lebih lanjut mengenai layanan PUSDAI
                    Jawa Barat, silakan hubungi kami melalui halaman kontak.
                </p>
            </div>

            <a href="{{ route('kontak') }}" class="primary-button">
                Hubungi Kami
            </a>

        </div>

    </div>
</section>

@endsection