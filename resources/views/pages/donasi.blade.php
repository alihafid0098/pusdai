@extends('layouts.app')

@section('title', 'Donasi - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>


<div class="container inner-hero-content">
    <span class="hero-badge">PUSDAI CARE</span>

    <h1>Donasi & Kepedulian</h1>

    <p>
        Bersama membantu menghadirkan manfaat dan kebaikan
        bagi masyarakat melalui program PUSDAI Jawa Barat.
    </p>
</div>


</section>

<section class="donasi-tools-section">

    <div class="container">

        <div class="donasi-tools-grid">

            {{-- KALKULATOR ZAKAT --}}
            <div class="zakat-card">

                <div class="zakat-head">
                    <span class="zakat-icon">🧮</span>
                    <div>
                        <h2>Kalkulator Zakat Instan</h2>
                        <p>Hitung nisab dan kewajiban zakat Anda secara otomatis.</p>
                    </div>
                </div>

                <div class="zakat-tabs">
                    <button type="button" class="zakat-tab active" data-zakat-tab="profesi">
                        Zakat Profesi (Penghasilan)
                    </button>
                    <button type="button" class="zakat-tab" data-zakat-tab="maal">
                        Zakat Maal (Tabungan/Harta)
                    </button>
                </div>

                {{-- PROFESI --}}
                <div class="zakat-panel active" data-zakat-panel="profesi">
                    <label for="zakat-penghasilan">Penghasilan Bulanan (Rp)</label>
                    <input type="number" id="zakat-penghasilan" min="0" step="100000" placeholder="Masukkan nominal pendapatan bulanan Anda...">

                    <p class="zakat-note">
                        Nisab zakat profesi setara 85 gram emas per tahun
                        (kisaran Rp 7.500.000 per bulan).
                    </p>

                    <div class="zakat-result" id="zakat-result-profesi">
                        <span class="zakat-status">NISAB BELUM TERPENUHI</span>
                        <strong>Rp 0</strong>
                        <p>Penghasilan belum melampaui batas minimum nisab bulanan wajib zakat.</p>
                    </div>
                </div>

                {{-- MAAL --}}
                <div class="zakat-panel" data-zakat-panel="maal">
                    <label for="zakat-harta">Total Harta / Tabungan (Rp)</label>
                    <input type="number" id="zakat-harta" min="0" step="100000" placeholder="Masukkan total tabungan, emas, dan harta simpanan...">

                    <p class="zakat-note">
                        Nisab zakat maal 85 gram emas (kisaran Rp 127.500.000)
                        dan telah dimiliki selama satu tahun (haul).
                    </p>

                    <div class="zakat-result" id="zakat-result-maal">
                        <span class="zakat-status">NISAB BELUM TERPENUHI</span>
                        <strong>Rp 0</strong>
                        <p>Harta belum melampaui nisab, belum wajib zakat maal.</p>
                    </div>
                </div>

                <p class="zakat-disclaimer">
                    Hasil hitung bersifat perkiraan. Untuk perhitungan yang
                    lebih teliti, silakan konsultasi ke Layanan Konsultasi Syariah.
                </p>

            </div>

            {{-- FORMULIR DONASI --}}
            <div class="donasi-form-card">

                <h2>Formulir Donasi</h2>
                <p class="donasi-form-lead">
                    Tunaikan zakat atau salurkan kepedulian Anda, lalu konfirmasi
                    lewat WhatsApp petugas PUSDAI.
                </p>

                <form id="donasi-form">

                    <div class="form-group">
                        <label for="donasi-jenis">Jenis Donasi / ZIS</label>
                        <select id="donasi-jenis" required>
                            <option value="Infak Masjid">Infak Masjid</option>
                            <option value="Sedekah Sosial">Sedekah Sosial</option>
                            <option value="Zakat Maal">Zakat Maal</option>
                            <option value="Zakat Terarah">Zakat Terarah</option>
                            <option value="Wakaf Pembangunan">Wakaf Pembangunan</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="donasi-nama">Nama Donatur</label>
                        <input type="text" id="donasi-nama" required maxlength="100" placeholder="Nama lengkap atau nama yang ingin dicatat">
                    </div>

                    <div class="form-group">
                        <label for="donasi-email">Alamat Email</label>
                        <input type="email" id="donasi-email" required maxlength="120" placeholder="Alamat email aktif...">
                    </div>

                    <div class="form-group">
                        <label for="donasi-nominal">Nominal Donasi (Rp)</label>
                        <input type="number" id="donasi-nominal" required min="10000" step="1000" placeholder="Min Rp 10.000...">
                    </div>

                    <div class="form-group">
                        <label for="donasi-metode">Metode Pembayaran</label>
                        <select id="donasi-metode" required>
                            <option value="QRIS">QRIS</option>
                            <option value="BSI Virtual Account">BSI Virtual Account</option>
                            <option value="Transfer Bank Mandiri">Transfer Bank Mandiri</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="donasi-pesan">Pesan / Doa (Opsional)</label>
                        <textarea id="donasi-pesan" rows="3" maxlength="300" placeholder="Tulis doa atau pesan khusus Anda..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary donasi-submit">
                        Buat Konfirmasi Donasi
                    </button>

                    <p class="form-hint">
                        Konfirmasi dikirim via WhatsApp petugas PUSDAI. Tidak ada
                        pembayaran yang diproses otomatis di situs ini.
                    </p>
                </form>

                <div class="donasi-summary" id="donasi-summary" hidden></div>

            </div>

        </div>

    </div>

</section>

<section class="donation-page-section">


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


</section>

<section class="donation-method-section">


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


</section>

<section class="donation-contact-section">


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


</section>

@endsection

@push('scripts')
<script>
    (function () {
        const rupiah = (nilai) => 'Rp ' + Math.round(nilai).toLocaleString('id-ID');

        /* ============ TAB KALKULATOR ============ */
        const tabs = document.querySelectorAll('.zakat-tab');
        const panels = document.querySelectorAll('.zakat-panel');

        tabs.forEach((tab) => {
            tab.addEventListener('click', function () {
                tabs.forEach((t) => t.classList.remove('active'));
                panels.forEach((p) => p.classList.remove('active'));

                tab.classList.add('active');

                const target = document.querySelector('[data-zakat-panel="' + tab.dataset.zakatTab + '"]');
                if (target) {
                    target.classList.add('active');
                }
            });
        });

        /* ============ HITUNG ZAKAT ============ */
        const NISAB_PROFESI = 7500000;      // 85 gram emas / tahun, perkiraan bulanan
        const NISAB_MAAL = 127500000;       // 85 gram emas, perkiraan
        const PERSEN_ZAKAT = 0.025;

        function terapkanHasil(hasilEl, nilai, nisab, labelNisab) {
            const status = hasilEl.querySelector('.zakat-status');
            const nominal = hasilEl.querySelector('strong');
            const ket = hasilEl.querySelector('p');

            hasilEl.classList.remove('terpenuhi', 'belum');

            if (!nilai || nilai <= 0) {
                status.textContent = 'NISAB BELUM TERPENUHI';
                nominal.textContent = 'Rp 0';
                ket.textContent = labelNisab;
                hasilEl.classList.add('belum');
                return;
            }

            if (nilai >= nisab) {
                hasilEl.classList.add('terpenuhi');
                status.textContent = 'NISAB TERPENUHI — ZAKAT 2,5%';
                nominal.textContent = rupiah(nilai * PERSEN_ZAKAT);
                ket.textContent = 'Kewajiban zakat diperkirakan ' + rupiah(nilai * PERSEN_ZAKAT) + ' dari ' + rupiah(nilai) + '.';
            } else {
                hasilEl.classList.add('belum');
                status.textContent = 'NISAB BELUM TERPENUHI';
                nominal.textContent = 'Rp 0';
                ket.textContent = 'Belum mencapai nisab (' + rupiah(nisab) + '), belum wajib zakat.';
            }
        }

        const inputPenghasilan = document.getElementById('zakat-penghasilan');
        const inputHarta = document.getElementById('zakat-harta');

        if (inputPenghasilan) {
            inputPenghasilan.addEventListener('input', function () {
                terapkanHasil(
                    document.getElementById('zakat-result-profesi'),
                    parseFloat(this.value),
                    NISAB_PROFESI,
                    'Penghasilan belum melampaui batas minimum nisab bulanan wajib zakat.'
                );
            });
        }

        if (inputHarta) {
            inputHarta.addEventListener('input', function () {
                terapkanHasil(
                    document.getElementById('zakat-result-maal'),
                    parseFloat(this.value),
                    NISAB_MAAL,
                    'Harta belum melampaui nisab, belum wajib zakat maal.'
                );
            });
        }

        /* ============ FORMULIR DONASI ============ */
        const form = document.getElementById('donasi-form');

        if (!form) {
            return;
        }

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            const jenis = document.getElementById('donasi-jenis').value;
            const nama = document.getElementById('donasi-nama').value.trim();
            const email = document.getElementById('donasi-email').value.trim();
            const nominal = parseInt(document.getElementById('donasi-nominal').value, 10);
            const metode = document.getElementById('donasi-metode').value;
            const pesan = document.getElementById('donasi-pesan').value.trim();

            if (!nama || !email || !nominal || nominal < 10000) {
                alert('Mohon isi nama, email, dan nominal minimal Rp 10.000.');
                return;
            }

            const teks = [
                'Konfirmasi Donasi PUSDAI Care',
                '',
                'Jenis: ' + jenis,
                'Nama: ' + nama,
                'Email: ' + email,
                'Nominal: ' + rupiah(nominal),
                'Metode: ' + metode,
                pesan ? 'Pesan: ' + pesan : null,
            ].filter(Boolean).join('\n');

            const summary = document.getElementById('donasi-summary');
            summary.hidden = false;
            summary.innerHTML = '';

            const judul = document.createElement('strong');
            judul.textContent = 'Ringkasan donasi ' + rupiah(nominal);
            summary.appendChild(judul);

            const rincian = document.createElement('p');
            rincian.textContent = jenis + ' • ' + metode + ' • atas nama ' + nama;
            summary.appendChild(rincian);

            const tautan = document.createElement('a');
            tautan.href = 'https://wa.me/6285143364323?text=' + encodeURIComponent(teks);
            tautan.target = '_blank';
            tautan.rel = 'noopener';
            tautan.className = 'btn btn-primary';
            tautan.textContent = 'Kirim Konfirmasi via WhatsApp';
            summary.appendChild(tautan);

            const catatan = document.createElement('p');
            catatan.className = 'donasi-summary-note';
            catatan.textContent = 'Petugas akan mengirim detail QRIS / nomor Virtual Account dan verifikasi donasi Anda.';
            summary.appendChild(catatan);
        });
    })();
</script>
@endpush
