@extends('layouts.app')

@section('title', 'Kontak - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">HUBUNGI KAMI</span>

        <h1>Kontak PUSDAI</h1>

        <p>
            Silakan hubungi PUSDAI Jawa Barat untuk mendapatkan
            informasi mengenai layanan dan kegiatan kami.
        </p>
    </div>
</section>


<section class="contact-page-section">

    <div class="container">

        <div class="section-heading center">
            <span class="section-label">KONTAK KAMI</span>

            <h2>
                Kami Siap Membantu
            </h2>

            <p>
                Jangan ragu untuk menghubungi kami apabila membutuhkan
                informasi mengenai PUSDAI Jawa Barat.
            </p>
        </div>


        <div class="contact-page-grid">

            {{-- Alamat --}}
            <div class="contact-page-card">

                <div class="contact-page-icon">
                    📍
                </div>

                <h3>Alamat</h3>

                <p>
                    PUSDAI Jawa Barat
                    <br>
                    Jl. Diponegoro No. 63
                    <br>
                    Bandung, Jawa Barat
                </p>

            </div>


            {{-- Telepon --}}
            <div class="contact-page-card">

                <div class="contact-page-icon">
                    ☎️
                </div>

                <h3>Telepon</h3>

                <p>
                    Hubungi kami melalui nomor telepon
                    untuk mendapatkan informasi layanan.
                </p>

                <a href="tel:+62224200000">
                    Hubungi Sekarang →
                </a>

            </div>


            {{-- Email --}}
            <div class="contact-page-card">

                <div class="contact-page-icon">
                    ✉️
                </div>

                <h3>Email</h3>

                <p>
                    Kirim pertanyaan atau informasi melalui
                    alamat email resmi PUSDAI Jawa Barat.
                </p>

                <a href="mailto:info@pusdai.or.id">
                    Kirim Email →
                </a>

            </div>

        </div>


        <div class="contact-main-grid">

            {{-- Form --}}
            <div class="contact-form-box">

                <span class="section-label">
                    KIRIM PESAN
                </span>

                <h2>
                    Ada yang ingin ditanyakan?
                </h2>

                <p>
                    Silakan isi formulir berikut dan sampaikan
                    pertanyaan atau kebutuhan informasi Anda.
                </p>

                <form action="#" method="POST">

                    @csrf

                    <div class="contact-form-row">

                        <div class="contact-input-group">
                            <label for="nama">
                                Nama
                            </label>

                            <input
                                type="text"
                                id="nama"
                                name="nama"
                                placeholder="Masukkan nama Anda"
                            >
                        </div>

                        <div class="contact-input-group">
                            <label for="email">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Masukkan email Anda"
                            >
                        </div>

                    </div>


                    <div class="contact-input-group">

                        <label for="subjek">
                            Subjek
                        </label>

                        <input
                            type="text"
                            id="subjek"
                            name="subjek"
                            placeholder="Subjek pesan"
                        >

                    </div>


                    <div class="contact-input-group">

                        <label for="pesan">
                            Pesan
                        </label>

                        <textarea
                            id="pesan"
                            name="pesan"
                            rows="6"
                            placeholder="Tulis pesan Anda..."
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        class="contact-submit-button"
                    >
                        Kirim Pesan
                    </button>

                </form>

            </div>


            {{-- Informasi --}}
            <div class="contact-info-box">

                <div class="contact-info-content">

                    <span class="section-label">
                        PUSDAI JAWA BARAT
                    </span>

                    <h2>
                        Temukan Kami
                    </h2>

                    <p>
                        PUSDAI Jawa Barat hadir sebagai pusat kegiatan
                        dakwah Islam dan pelayanan umat di Jawa Barat.
                    </p>

                </div>


                <div class="contact-info-list">

                    <div class="contact-info-item">

                        <span class="contact-info-icon">
                            📍
                        </span>

                        <div>
                            <strong>Lokasi</strong>

                            <p>
                                Jl. Diponegoro No. 63,
                                Bandung, Jawa Barat
                            </p>
                        </div>

                    </div>


                    <div class="contact-info-item">

                        <span class="contact-info-icon">
                            🕐
                        </span>

                        <div>
                            <strong>Jam Pelayanan</strong>

                            <p>
                                Senin - Jumat
                                <br>
                                08.00 - 16.00 WIB
                            </p>
                        </div>

                    </div>


                    <div class="contact-info-item">

                        <span class="contact-info-icon">
                            🌐
                        </span>

                        <div>
                            <strong>Media Sosial</strong>

                            <p>
                                Instagram, YouTube, dan Facebook
                                PUSDAI Jawa Barat
                            </p>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection