@extends('layouts.app')

@section('title', 'Layanan Jenazah & Ambulans - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">SIAGA 24 JAM</span>

        <h1>Layanan Amil &amp; Pengurusan Jenazah</h1>

        <p>
            DKM Pusdai Jabar siap siaga membantu proses pengurusan jenazah
            jamaah, mulai dari penyediaan ambulans, pemandian, kain kafan,
            pensholatan, hingga pemakaman secara syar'i.
        </p>
    </div>
</section>

<section class="jenazah-section">
    <div class="container">

        <div class="jenazah-hotline">
            <div>
                <span class="section-label">KONTAK DARURAT</span>
                <h2>Ambulans Siaga 24 Jam</h2>
                <p>
                    Untuk keadaan darurat, hubungi hotline di bawah ini.
                    Petugas akan mengarahkan proses penjemputan jenazah.
                </p>
            </div>

            <div class="jenazah-hotline-actions">
                <a href="tel:+6281234567890" class="jenazah-call">
                    0812-3456-7890
                </a>

                <a
                    href="https://wa.me/6281234567890?text={{ urlencode('Assalamualaikum, saya ingin mengajukan layanan pengurusan jenazah PUSDAI.') }}"
                    class="jenazah-wa"
                    target="_blank"
                    rel="noopener"
                >
                    Hubungi via WhatsApp
                </a>
            </div>
        </div>

        <div class="jenazah-grid">

            <div class="service-page-card">
                <div class="service-page-icon">🧾</div>
                <div class="service-page-content">
                    <h3>Paket Pengurusan Jenazah Lengkap</h3>
                    <p>
                        Penyediaan kain kafan standar, perlengkapan mandi
                        jenazah, amil pemandi (putra/putri), dan pendampingan
                        liang lahat.
                    </p>
                </div>
            </div>

            <div class="service-page-card">
                <div class="service-page-icon">🚐</div>
                <div class="service-page-content">
                    <h3>Mobil Jenazah / Ambulans</h3>
                    <p>
                        Siap mengantarkan jenazah ke wilayah TPU se-Bandung
                        Raya maupun luar kota dengan koordinasi cepat.
                    </p>
                </div>
            </div>

            <div class="service-page-card">
                <div class="service-page-icon">🤝</div>
                <div class="service-page-content">
                    <h3>Bebas Biaya bagi Dhuafa</h3>
                    <p>
                        Keringanan penuh atau bebas biaya bagi warga kurang
                        mampu/dhuafa, dibiayai dari Pusdai Care dan zakat.
                    </p>
                </div>
            </div>

        </div>

        <div class="jenazah-form-wrap">

            <div class="jenazah-form-info">
                <span class="section-label">PENGAJUAN</span>
                <h2>Formulir Pengajuan Amil</h2>
                <p>
                    Isi data singkat berikut, lalu kirim lewat WhatsApp.
                    Formulir akan terisi otomatis agar tim siaga langsung
                    menerima informasinya.
                </p>
                <p class="jenazah-note">
                    Data hanya dipakai untuk koordinasi pengurusan jenazah.
                </p>
            </div>

            <form class="jenazah-form" id="jenazah-form">

                <div class="form-group">
                    <label for="nama-almarhum">Nama Almarhum / Almarhumah</label>
                    <input type="text" id="nama-almarhum" required maxlength="100">
                </div>

                <div class="form-group">
                    <label for="tanggal-wafat">Tanggal Wafat</label>
                    <input type="date" id="tanggal-wafat" required>
                </div>

                <div class="form-group">
                    <label for="alamat-duka">Alamat Duka / Lokasi Penjemputan</label>
                    <textarea id="alamat-duka" rows="3" required maxlength="300"></textarea>
                </div>

                <div class="form-group">
                    <label for="nama-kontak">Nama Kontak Keluarga</label>
                    <input type="text" id="nama-kontak" required maxlength="100">
                </div>

                <div class="form-group">
                    <label for="telepon-keluarga">Telepon Keluarga</label>
                    <input type="tel" id="telepon-keluarga" required maxlength="25">
                </div>

                <button type="submit" class="btn btn-primary">
                    Kirim Formulir Siaga
                </button>

                <p class="form-hint">
                    Tombol ini membuka WhatsApp petugas siaga dengan pesan yang sudah terisi.
                </p>

            </form>

        </div>

    </div>
</section>

@endsection

@push('scripts')
<script>
    document.getElementById('jenazah-form').addEventListener('submit', function (event) {
        event.preventDefault();

        const nama = document.getElementById('nama-almarhum').value.trim();
        const tanggal = document.getElementById('tanggal-wafat').value;
        const alamat = document.getElementById('alamat-duka').value.trim();
        const kontak = document.getElementById('nama-kontak').value.trim();
        const telepon = document.getElementById('telepon-keluarga').value.trim();

        const pesan = [
            'Pengajuan Amil & Pengurusan Jenazah PUSDAI',
            '',
            'Nama jenazah: ' + nama,
            'Tanggal wafat: ' + tanggal,
            'Alamat duka: ' + alamat,
            'Kontak keluarga: ' + kontak,
            'Telepon: ' + telepon,
        ].join('\n');

        window.open('https://wa.me/6281234567890?text=' + encodeURIComponent(pesan), '_blank', 'noopener');
    });
</script>
@endpush
