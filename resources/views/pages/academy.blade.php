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

        <div class="jadwal-head">
            <span class="section-label">JADWAL RUTIN</span>
            <h2>Jadwal Kajian Rutin</h2>
            <p>
                Kajian rutin Masjid PUSDAI Jawa Barat, terbuka untuk umum
                dan gratis. Jadwal berlaku setiap pekan di Ruang Multimedia
                dan ruang kelas PUSDAI.
            </p>
        </div>

        <div class="jadwal-grid">

            <article class="jadwal-card">
                <span class="jadwal-hari">Senin</span>
                <h3>Qur'an Tahsin</h3>
                <p class="jadwal-ustadz">Ust. Denoi Abdul Aziz</p>
                <ul>
                    <li>09.00 – 11.30 WIB</li>
                    <li>Ruang Multimedia PUSDAI</li>
                </ul>
            </article>

            <article class="jadwal-card">
                <span class="jadwal-hari">Selasa</span>
                <h3>Qur'an Essentia</h3>
                <p class="jadwal-ustadz">Ust. Fajrin Nurul Haq</p>
                <ul>
                    <li>10.00 – 11.30 WIB</li>
                    <li>Ruang Multimedia PUSDAI</li>
                </ul>
            </article>

            <article class="jadwal-card">
                <span class="jadwal-hari">Selasa</span>
                <h3>Qur'an Pra Tahsin</h3>
                <p class="jadwal-ustadz">Ust. Eko Safar Hardianto</p>
                <ul>
                    <li>13.00 – 14.30 WIB — Ruang Multimedia</li>
                    <li>15.00 – 16.00 WIB — Ruang Kecil Lt. 3</li>
                </ul>
            </article>

            <article class="jadwal-card">
                <span class="jadwal-hari">Kamis</span>
                <h3>Fiqih Ibadah</h3>
                <p class="jadwal-ustadz">Ust. Ramdan Fauzi</p>
                <ul>
                    <li>07.30 – 10.00 WIB</li>
                    <li>Ruang Multimedia PUSDAI</li>
                </ul>
            </article>

            <article class="jadwal-card">
                <span class="jadwal-hari">Kamis</span>
                <h3>Talk Show Dhuha</h3>
                <p class="jadwal-ustadz">Kajian Dhuha interaktif</p>
                <ul>
                    <li>07.00 – 07.45 WIB</li>
                    <li>Ruang Multimedia PUSDAI</li>
                </ul>
            </article>

            <article class="jadwal-card">
                <span class="jadwal-hari">Kamis</span>
                <h3>Irsyad Tazkiyyah</h3>
                <p class="jadwal-ustadz">Kajian tazkiyah (pekan ke-3)</p>
                <ul>
                    <li>09.00 – 11.00 WIB</li>
                    <li>Ruang PUSDAI Jawa Barat</li>
                </ul>
            </article>

            <article class="jadwal-card">
                <span class="jadwal-hari">Jum'at</span>
                <h3>Bahasa Arab Al-Qur'an</h3>
                <p class="jadwal-ustadz">Ust. Fathurrahman M. Basyari</p>
                <ul>
                    <li>08.30 – 10.00 WIB</li>
                    <li>Ruang Multimedia PUSDAI</li>
                </ul>
            </article>

            <article class="jadwal-card">
                <span class="jadwal-hari">Sabtu</span>
                <h3>Aqidah Akhlaq</h3>
                <p class="jadwal-ustadz">Ust. Reza Noor Umboro</p>
                <ul>
                    <li>09.00 – 11.00 WIB</li>
                    <li>Ruang Multimedia PUSDAI</li>
                </ul>
            </article>

        </div>

        <div class="jadwal-info">
            <div>
                <strong>Gratis untuk umum</strong>
                <p>
                    Informasi kajian: Sekretariat UPP. AQSA PUSDAI —
                    Ruang Administrasi Umum (Adum) Lt. 2.
                </p>
            </div>

            <a href="https://wa.me/6285143364323" target="_blank" rel="noopener" class="btn btn-primary">
                WhatsApp 0851-4336-4323
            </a>
        </div>

    </div>
</section>

@endsection
