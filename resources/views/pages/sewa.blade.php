@extends('layouts.app')

@section('title', 'Penggunaan Fasilitas - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">FASILITAS UMAT</span>

        <h1>Penggunaan Fasilitas &amp; Ruang</h1>

        <p>
            Masjid Raya Pusdai Jabar memfasilitasi penggunaan ruang ibadah
            utama, multimedia, ruang seminar, dan plaza untuk syiar Islam,
            kajian ilmiah, serta kegiatan keumatan dengan dukungan infaq
            pemeliharaan.
        </p>
    </div>
</section>

<section class="services-page-section">
    <div class="container">

        <div class="section-heading center">
            <span class="section-label">PILIHAN RUANG</span>

            <h2>Ruang &amp; Fasilitas Ibadah</h2>

            <p>
                Kapasitas dan rekomendasi infaq di bawah ini menjadi acuan
                pengajuan penggunaan fasilitas.
            </p>
        </div>

        <div class="services-page-grid">

            <div class="service-page-card">
                <div class="service-page-icon">🕌</div>
                <div class="service-page-content">
                    <h3>Masjid (Ruang Utama)</h3>
                    <p>
                        Ruang ibadah utama Masjid Raya Pusdai Jabar, cocok untuk
                        kegiatan tablig akbar, akad nikah syar'i, dan dzikir bersama.
                    </p>
                    <ul class="facility-meta">
                        <li><strong>Kapasitas:</strong> 4.000 orang</li>
                        <li><strong>Infaq:</strong> Sukarela (khusus ibadah)</li>
                    </ul>
                </div>
            </div>

            <div class="service-page-card">
                <div class="service-page-icon">🎥</div>
                <div class="service-page-content">
                    <h3>Ruangan Multimedia</h3>
                    <p>
                        Ruang studio modern dengan kelengkapan rekaman audio,
                        siaran langsung streaming, dan podcast syiar Islam.
                    </p>
                    <ul class="facility-meta">
                        <li><strong>Kapasitas:</strong> 60 orang</li>
                        <li><strong>Rekomendasi infaq:</strong> Rp 2.500.000 / hari</li>
                    </ul>
                </div>
            </div>

            <div class="service-page-card">
                <div class="service-page-icon">🎤</div>
                <div class="service-page-content">
                    <h3>Ruangan Seminar Besar</h3>
                    <p>
                        Aula seminar luas dengan proyektor, AC sentral, dan sound
                        system lengkap untuk kajian ilmiah, pelatihan, maupun
                        seminar nasional.
                    </p>
                    <ul class="facility-meta">
                        <li><strong>Kapasitas:</strong> 100 orang</li>
                        <li><strong>Rekomendasi infaq:</strong> Rp 2.000.000 / hari</li>
                    </ul>
                </div>
            </div>

            <div class="service-page-card">
                <div class="service-page-icon">📝</div>
                <div class="service-page-content">
                    <h3>Ruangan Seminar Kecil A</h3>
                    <p>
                        Ruang rapat atau kelas diskusi interaktif yang tenang
                        untuk pembelajaran tahsin, rapat koordinasi, atau kelas
                        materi agama.
                    </p>
                    <ul class="facility-meta">
                        <li><strong>Kapasitas:</strong> 40 orang</li>
                        <li><strong>Rekomendasi infaq:</strong> Rp 1.000.000 / hari</li>
                    </ul>
                </div>
            </div>

            <div class="service-page-card">
                <div class="service-page-icon">📋</div>
                <div class="service-page-content">
                    <h3>Ruangan Seminar Kecil B</h3>
                    <p>
                        Ruang rapat atau kelas diskusi interaktif yang tenang
                        untuk pembelajaran tahsin, rapat koordinasi, atau kelas
                        materi agama.
                    </p>
                    <ul class="facility-meta">
                        <li><strong>Kapasitas:</strong> 40 orang</li>
                        <li><strong>Rekomendasi infaq:</strong> Rp 1.000.000 / hari</li>
                    </ul>
                </div>
            </div>

            <div class="service-page-card">
                <div class="service-page-icon">🌳</div>
                <div class="service-page-content">
                    <h3>Plaza (Halaman Luar)</h3>
                    <p>
                        Area outdoor/plaza terbuka luas bernuansa asri di
                        lingkungan Pusdai, cocok untuk bazar kuliner UMKM,
                        manasik haji massal, atau festival keagamaan.
                    </p>
                    <ul class="facility-meta">
                        <li><strong>Kapasitas:</strong> 1.000 orang</li>
                        <li><strong>Rekomendasi infaq:</strong> Rp 10.000.000 / hari</li>
                    </ul>
                </div>
            </div>

        </div>

        <div class="facility-cta">
            <h3>Ajukan penggunaan fasilitas</h3>
            <p>
                Sampaikan tanggal, jenis kegiatan, dan perkiraan jumlah peserta
                ke sekretariat PUSDAI untuk penjadwalan dan konfirmasi.
            </p>
            <a href="{{ route('kontak') }}" class="btn btn-primary">Hubungi Sekretariat</a>
        </div>

    </div>
</section>

@endsection
