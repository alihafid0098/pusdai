@extends('layouts.app')

@section('title', 'PUSDAI Jawa Barat')

@section('content')

{{-- =====================================================
    HERO SECTION
===================================================== --}}

<section class="home-hero">

    <div class="home-hero-background">

        <img
            src="{{ asset('images/arsitektur1.jpeg') }}"
            alt="Masjid Pusdai Jawa Barat"
        >

        <div class="home-hero-overlay"></div>

    </div>

    <div class="home-container home-hero-container">

        <div class="home-hero-grid">

            {{-- HERO CONTENT --}}

            <div class="home-hero-content">

                <div class="home-hero-badge">

                    <i data-lucide="sparkles"></i>

                    <span>
                        Portal Syiar & Kemakmuran Masjid
                    </span>

                </div>

                <h1>
                    Masjid Raya Pusat Dakwah Islam

                    <span>
                        Jawa Barat
                    </span>
                </h1>

                <p>
                    Selamat datang di portal informasi pelayanan umat
                    Masjid Pusdai Jawa Barat. Temukan jadwal kajian rutin,
                    laporan transparansi kas keuangan, artikel keagamaan,
                    serta layanan kemitraan dakwah di sini.
                </p>

                <div class="home-hero-buttons">

                    <a
                        href="{{ route('agenda') }}"
                        class="home-btn home-btn-primary"
                    >
                        <i data-lucide="calendar-days"></i>

                        <span>
                            Lihat Agenda Kegiatan
                        </span>
                    </a>

                    <a
                        href="{{ route('sejarah') }}"
                        class="home-btn home-btn-outline"
                    >
                        <span>
                            Tentang Kami
                        </span>

                        <i data-lucide="arrow-right"></i>
                    </a>

                </div>

            </div>


            {{-- PRAYER TIMES --}}

            <div class="home-prayer-wrapper">

                <div class="home-prayer">

                    <div class="home-prayer-header">

                        <i data-lucide="clock"></i>

                        <h3>
                            Jadwal Shalat Bandung
                        </h3>

                    </div>

                    <div class="home-prayer-current">

                        <div
                            id="current-time"
                            class="home-prayer-clock"
                        >
                            00:00:00
                        </div>

                        <div
                            id="next-prayer"
                            class="home-prayer-next"
                        >
                            Menuju Subuh - 04:40
                        </div>

                    </div>

                    <div class="home-prayer-list">

                        <div
                            class="home-prayer-item"
                            data-time="04:30"
                        >
                            <span>Imsak</span>
                            <strong>04:30</strong>
                        </div>

                        <div
                            class="home-prayer-item"
                            data-time="04:40"
                        >
                            <span>Subuh</span>
                            <strong>04:40</strong>
                        </div>

                        <div
                            class="home-prayer-item"
                            data-time="11:55"
                        >
                            <span>Dzuhur</span>
                            <strong>11:55</strong>
                        </div>

                        <div
                            class="home-prayer-item"
                            data-time="15:17"
                        >
                            <span>Ashar</span>
                            <strong>15:17</strong>
                        </div>

                        <div
                            class="home-prayer-item"
                            data-time="17:48"
                        >
                            <span>Maghrib</span>
                            <strong>17:48</strong>
                        </div>

                        <div
                            class="home-prayer-item"
                            data-time="19:02"
                        >
                            <span>Isya</span>
                            <strong>19:02</strong>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
    ABOUT SECTION
===================================================== --}}

<section class="home-about">

    <div class="home-container">

        <div class="home-about-grid">

            <div class="home-about-content">

                <div class="home-section-label">
                    Tentang Kami
                </div>

                <h2>
                    Masjid Pusat Dakwah Islam
                    (PUSDAI) Jawa Barat
                </h2>

                <p>
                    Masjid PUSDAI Jawa Barat merupakan pusat dakwah Islam
                    yang berada di Kota Bandung. Selain menjadi tempat
                    ibadah, masjid ini juga aktif dalam kegiatan pendidikan,
                    sosial, pengajian, kajian Islam, dan berbagai program
                    kemasyarakatan.
                </p>

                <p>
                    Dengan arsitektur yang megah dan suasana yang nyaman,
                    Masjid PUSDAI menjadi salah satu ikon Islami di Jawa Barat.
                    Berdiri sejak gagasan awal tahun 1982, PUSDAI terus
                    berperan sebagai pusat pengembangan dakwah, pendidikan,
                    dan ekonomi syariah.
                </p>

                <div class="home-about-buttons">

                    <a
                        href="{{ route('sejarah') }}"
                        class="home-about-primary"
                    >
                        Baca Sejarah Pusdai

                        <i data-lucide="arrow-right"></i>
                    </a>

                    <a
                        href="{{ route('profil') }}"
                        class="home-about-secondary"
                    >
                        Struktur DKM
                    </a>

                </div>

            </div>


            <div class="home-about-image">

                <div class="home-about-image-wrapper">

                    <img
                        src="{{ asset('images/galeri-arsitektur.jpeg') }}"
                        alt="Masjid Pusdai Jabar"
                    >

                </div>

                <div class="home-year-badge">

                    <div>
                        1982
                    </div>

                    <span>
                        Tahun Pencetusan Gagasan
                    </span>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
    EVENTS SECTION
===================================================== --}}

<section
    class="home-events"
    id="kegiatan"
>

    <div class="home-container">

        <div class="home-section-heading">

            <div>

                <div class="home-section-label">
                    Agenda & Kegiatan
                </div>

                <h2>
                    Agenda Kegiatan Terdekat
                </h2>

                <p>
                    Daftar jadwal kegiatan keagamaan, dakwah, sosial,
                    dan kajian rutin yang akan segera dilaksanakan
                    di Masjid Pusdai.
                </p>

            </div>

            <a
                href="{{ route('agenda') }}"
                class="home-section-link"
            >
                Lihat Semua Agenda

                <i data-lucide="arrow-right"></i>
            </a>

        </div>


        <div class="home-event-grid">

            {{-- EVENT 1 --}}

            <div class="home-event-card">

                <div class="home-event-image">

                    <img
                        src="{{ asset('images/pengajian-assalam-di-masjid.jpeg') }}"
                        alt="Agenda PUSDAI"
                    >

                    <div class="home-event-date">

                        <strong>
                            12
                        </strong>

                        <span>
                            OKT
                        </span>

                    </div>

                </div>

                <div class="home-event-content">

                    <span class="home-event-category">
                        KAJIAN
                    </span>

                    <h3>
                        Kajian Islam dan Pembinaan Umat
                    </h3>

                    <p>
                        Kajian keislaman bersama para ustadz dan
                        tokoh agama untuk meningkatkan pemahaman umat.
                    </p>

                    <div class="home-event-time">

                        <i data-lucide="calendar-days"></i>

                        08.00 - 10.00 WIB

                    </div>

                </div>

            </div>


            {{-- EVENT 2 --}}

            <div class="home-event-card">

                <div class="home-event-image">

                    <img
                        src="{{ asset('images/pengajian-IPHI-masjid.jpeg') }}"
                        alt="Kegiatan PUSDAI"
                    >

                    <div class="home-event-date">

                        <strong>
                            18
                        </strong>

                        <span>
                            OKT
                        </span>

                    </div>

                </div>

                <div class="home-event-content">

                    <span class="home-event-category">
                        KEGIATAN
                    </span>

                    <h3>
                        Kegiatan Keislaman PUSDAI
                    </h3>

                    <p>
                        Berbagai kegiatan keagamaan dan pembinaan
                        masyarakat di lingkungan PUSDAI Jawa Barat.
                    </p>

                    <div class="home-event-time">

                        <i data-lucide="calendar-days"></i>

                        09.00 - 12.00 WIB

                    </div>

                </div>

            </div>


            {{-- EVENT 3 --}}

            <div class="home-event-card">

                <div class="home-event-image">

                    <img
                        src="{{ asset('images/khitan_massal.jpeg') }}"
                        alt="Khitan Massal Pusdai"
                    >

                    <div class="home-event-date">

                        <strong>
                            25
                        </strong>

                        <span>
                            OKT
                        </span>

                    </div>

                </div>

                <div class="home-event-content">

                    <span class="home-event-category">
                        SOSIAL
                    </span>

                    <h3>
                        Khitanan Massal PUSDAI
                    </h3>

                    <p>
                        Program bakti sosial pelayanan kesehatan dan
                        khitanan massal untuk anak-anak Jawa Barat.
                    </p>

                    <div class="home-event-time">

                        <i data-lucide="calendar-days"></i>

                        08.00 - 12.00 WIB

                    </div>

                </div>

            </div>


            {{-- EVENT 4 --}}

            <div class="home-event-card">

                <div class="home-event-image">

                    <img
                        src="{{ asset('images/pengajian_persistri.jpeg') }}"
                        alt="Kajian PUSDAI"
                    >

                    <div class="home-event-date">

                        <strong>
                            30
                        </strong>

                        <span>
                            OKT
                        </span>

                    </div>

                </div>

                <div class="home-event-content">

                    <span class="home-event-category">
                        KAJIAN
                    </span>

                    <h3>
                        Kajian Rutin PUSDAI
                    </h3>

                    <p>
                        Kegiatan kajian rutin untuk meningkatkan
                        wawasan dan pemahaman keislaman masyarakat.
                    </p>

                    <div class="home-event-time">

                        <i data-lucide="calendar-days"></i>

                        Sesuai jadwal

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
    NEWS SECTION
===================================================== --}}

<section class="home-news">

    <div class="home-container">

        <div class="home-section-heading">

            <div>

                <div class="home-section-label">
                    Berita & Pengumuman
                </div>

                <h2>
                    Berita Syiar & Kegiatan
                </h2>

                <p>
                    Dapatkan artikel kajian islam bermanfaat, liputan
                    berita agenda dakwah, serta pengumuman terbaru
                    dari pengurus DKM Pusdai.
                </p>

            </div>

            <a
                href="{{ route('berita') }}"
                class="home-section-link"
            >
                Lihat Semua Berita

                <i data-lucide="arrow-right"></i>
            </a>

        </div>


        <div class="home-news-grid">

            @php
                $homeNews = [
                    [
                        'image' => asset('images/manasik.png'),
                        'category' => 'LAYANAN',
                        'title' => 'Bimbingan Manasik Haji & Umrah PUSDAI Jawa Barat',
                        'excerpt' => 'Pelaksanaan bimbingan manasik haji dan umrah secara profesional dan terarah sesuai tuntunan syariat Islam.',
                        'date' => '07 Oktober 2026',
                        'slug' => 'kegiatan-keislaman-pusdai-jawa-barat'
                    ],
                    [
                        'image' => asset('images/galeri-mushaf.jpeg'),
                        'category' => 'INFORMASI',
                        'title' => 'Mushaf Al-Qur\'an Standar PUSDAI Jawa Barat',
                        'excerpt' => 'Mengenal keistimewaan dan nilai sejarah Mushaf Al-Qur\'an kebanggaan umat Islam Jawa Barat di Pusdai.',
                        'date' => '05 Oktober 2026',
                        'slug' => 'informasi-pelayanan-pusdai'
                    ],
                    [
                        'image' => asset('images/santunan_jompo.jpeg'),
                        'category' => 'SOSIAL',
                        'title' => 'Program Santunan Lansia & Dhuafa Pusdai Care',
                        'excerpt' => 'Komitmen PUSDAI dalam mendukung kepedulian sosial kemasyarakatan dan pelayanan terbaik bagi dhuafa.',
                        'date' => '01 Oktober 2026',
                        'slug' => 'semangat-dakwah-masyarakat'
                    ],
                    [
                        'image' => asset('images/perpustakaan2.jpeg'),
                        'category' => 'PENDIDIKAN',
                        'title' => 'Perpustakaan Digital dan Literasi Islam PUSDAI',
                        'excerpt' => 'Pusat literasi keilmuan Islam, koleksi kitab kuning, dan ruang belajar nyaman untuk para generasi muslim.',
                        'date' => '28 September 2026',
                        'slug' => 'kajian-islam-dan-pembinaan-umat'
                    ]
                ];
            @endphp


            @foreach($homeNews as $article)

                <a
                    href="{{ route('berita.detail', $article['slug']) }}"
                    class="home-news-card"
                >

                    <div class="home-news-image">

                        <img
                            src="{{ $article['image'] }}"
                            alt="{{ $article['title'] }}"
                        >

                    </div>

                    <div class="home-news-content">

                        <span class="home-news-category">
                            {{ $article['category'] }}
                        </span>

                        <h3>
                            {{ $article['title'] }}
                        </h3>

                        <p>
                            {{ $article['excerpt'] }}
                        </p>

                        <div class="home-news-date">
                            {{ $article['date'] }}
                        </div>

                    </div>

                </a>

            @endforeach

        </div>

    </div>

</section>


{{-- =====================================================
    SERVICES SECTION
===================================================== --}}

<section class="home-services">

    <div class="home-container">

        <div class="home-services-heading">

            <div>
                Layanan Terpadu
            </div>

            <h2>
                Layanan & Fasilitas Umat
            </h2>

            <p>
                Masjid Raya Pusdai Jabar menghadirkan berbagai fasilitas
                unggulan untuk melayani kebutuhan ibadah, pendidikan,
                dan sosial kemasyarakatan.
            </p>

        </div>


        <div class="home-services-grid">

            {{-- SERVICE 1 --}}

            <div class="home-service-card">

                <div class="home-service-icon">

                    <i data-lucide="heart"></i>

                </div>

                <h3>
                    Layanan Akad Nikah
                </h3>

                <p>
                    Pelayanan ibadah dan pembinaan keluarga sakinah
                    mawaddah warahmah dalam lingkup syariat.
                </p>

                <span>
                    Pelayanan Nikah
                </span>

            </div>


            {{-- SERVICE 2 --}}

            <div class="home-service-card">

                <div class="home-service-icon">

                    <i data-lucide="users"></i>

                </div>

                <h3>
                    Pembinaan Mualaf
                </h3>

                <p>
                    Pendampingan keislaman berkelanjutan bagi saudara
                    baru untuk memperkokoh akidah.
                </p>

                <span>
                    Bimbingan Akidah
                </span>

            </div>


            {{-- SERVICE 3 --}}

            <div class="home-service-card">

                <div class="home-service-icon">

                    <i data-lucide="book-open"></i>

                </div>

                <h3>
                    Perpustakaan Pusdai
                </h3>

                <p>
                    Pusat literasi, kajian literatur kitab kuning,
                    dan pengembangan keilmuan Islam.
                </p>

                <span>
                    Pusat Literasi
                </span>

            </div>


            {{-- SERVICE 4 --}}

            <div class="home-service-card">

                <div class="home-service-icon">

                    <i data-lucide="map-pin"></i>

                </div>

                <h3>
                    KBIHU Haji & Umrah
                </h3>

                <p>
                    Layanan bimbingan manasik terarah, profesional,
                    terakreditasi, sesuai tuntunan syariat.
                </p>

                <span>
                    Bimbingan Haji
                </span>

            </div>


            {{-- SERVICE 5 --}}

            <div class="home-service-card">

                <div class="home-service-icon">

                    <i data-lucide="graduation-cap"></i>

                </div>

                <h3>
                    Seminar & Kajian Islam
                </h3>

                <p>
                    Media edukasi publik dan peningkatan wawasan
                    keislaman moderat dan komparatif.
                </p>

                <span>
                    Edukasi Publik
                </span>

            </div>


            {{-- SERVICE 6 --}}

            <div class="home-service-card">

                <div class="home-service-icon">

                    <i data-lucide="stethoscope"></i>

                </div>

                <h3>
                    Layanan Jenazah
                </h3>

                <p>
                    Pelayanan pemanduan, pengkafanan, dan penyolatan
                    jenazah untuk umat Muslim.
                </p>

                <span>
                    Pelayanan Jenazah
                </span>

            </div>

        </div>


        <div class="home-services-button">

            <a
                href="{{ route('layanan') }}"
                class="home-service-button"
            >
                Lihat Semua Layanan & Detail Fasilitas

                <i data-lucide="arrow-right"></i>
            </a>

        </div>

    </div>

</section>


{{-- =====================================================
    DONATION CTA
===================================================== --}}

<section class="home-donation">

    <div class="home-container">

        <div class="home-donation-box">

            <div class="home-donation-glow"></div>

            <div class="home-donation-grid">

                <div class="home-donation-content">

                    <div class="home-donation-label">

                        <i data-lucide="heart"></i>

                        <span>
                            Pusdai Care
                        </span>

                    </div>

                    <h2>
                        Salurkan Donasi Terbaik Anda
                    </h2>

                    <p>
                        Dukung kemakmuran masjid dan program sosial
                        Pusdai Jabar melalui donasi zakat, infak,
                        dan sedekah. Setiap kontribusi Anda kami
                        kelola dengan transparan dan amanah.
                    </p>

                    <a
                        href="{{ route('donasi') }}"
                        class="home-donation-button"
                    >

                        <i data-lucide="heart"></i>

                        Donasi Sekarang

                    </a>

                </div>


                <div class="home-donation-types">

                    <div class="home-donation-type">

                        <i data-lucide="heart"></i>

                        <strong>
                            ZIS
                        </strong>

                        <span>
                            Infak & Sedekah
                        </span>

                    </div>


                    <div class="home-donation-type">

                        <i data-lucide="scale"></i>

                        <strong>
                            2.5%
                        </strong>

                        <span>
                            Zakat Maal
                        </span>

                    </div>


                    <div class="home-donation-type">

                        <i data-lucide="home"></i>

                        <strong>
                            Jariyah
                        </strong>

                        <span>
                            Wakaf
                        </span>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
    CONTACT INFO
===================================================== --}}

<section class="home-contact">

    <div class="home-container">

        <div class="home-contact-grid">

            <div class="home-contact-item">

                <div class="home-contact-icon">

                    <i data-lucide="map-pin"></i>

                </div>

                <div>

                    <div class="home-contact-title">
                        Alamat
                    </div>

                    <div class="home-contact-text">
                        Jl. Diponegoro No. 63, Bandung
                    </div>

                </div>

            </div>


            <div class="home-contact-item">

                <div class="home-contact-icon">

                    <i data-lucide="phone"></i>

                </div>

                <div>

                    <div class="home-contact-title">
                        Telepon
                    </div>

                    <div class="home-contact-text">
                        (022) 7217530/31
                    </div>

                </div>

            </div>


            <div class="home-contact-item">

                <div class="home-contact-icon">

                    <i data-lucide="mail"></i>

                </div>

                <div>

                    <div class="home-contact-title">
                        Email
                    </div>

                    <div class="home-contact-text">
                        pusdaijabar@gmail.com
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- =====================================================
    LUCIDE ICON
===================================================== --}}

<script src="https://unpkg.com/lucide@latest"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    if (typeof lucide !== 'undefined') {
        lucide.createIcons();
    }

    /* ================================
       JADWAL SHALAT
    ================================= */

    const currentTimeElement =
        document.getElementById('current-time');

    const nextPrayerElement =
        document.getElementById('next-prayer');

    const prayerItems =
        document.querySelectorAll('.home-prayer-item');

    const prayers = [
        {
            name: 'Imsak',
            time: '04:30'
        },
        {
            name: 'Subuh',
            time: '04:40'
        },
        {
            name: 'Dzuhur',
            time: '11:55'
        },
        {
            name: 'Ashar',
            time: '15:17'
        },
        {
            name: 'Maghrib',
            time: '17:48'
        },
        {
            name: 'Isya',
            time: '19:02'
        }
    ];

    function updatePrayerTime() {

        if (!currentTimeElement) {
            return;
        }

        const now = new Date();

        const hours =
            String(now.getHours()).padStart(2, '0');

        const minutes =
            String(now.getMinutes()).padStart(2, '0');

        const seconds =
            String(now.getSeconds()).padStart(2, '0');

        const currentTime =
            `${hours}:${minutes}`;

        currentTimeElement.textContent =
            `${hours}:${minutes}:${seconds}`;

        let nextPrayer =
            prayers.find(function (prayer) {
                return prayer.time > currentTime;
            });

        if (!nextPrayer) {
            nextPrayer = prayers[0];
        }

        if (nextPrayerElement) {

            nextPrayerElement.textContent =
                `Menuju ${nextPrayer.name} - ${nextPrayer.time}`;

        }

        prayerItems.forEach(function (item) {

            item.classList.remove('active');

            if (
                item.dataset.time === nextPrayer.time
            ) {

                item.classList.add('active');

            }

        });

    }

    updatePrayerTime();

    setInterval(updatePrayerTime, 1000);

});
</script>

@endsection