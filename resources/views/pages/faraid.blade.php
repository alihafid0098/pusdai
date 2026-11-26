@extends('layouts.app')

@section('title', 'Kalkulator Faraid - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">LAYANAN UMAT</span>

        <h1>Kalkulator Faraid</h1>

        <p>
            Informasi dan perhitungan dasar pembagian harta warisan
            berdasarkan ketentuan faraid dalam Islam.
        </p>
    </div>
</section>


<section class="faraid-section">

    <div class="container">

        <div class="section-heading center">

            <span class="section-label">
                KALKULATOR FARAID
            </span>

            <h2>
                Hitung Pembagian Harta Warisan
            </h2>

            <p>
                Gunakan formulir berikut untuk melakukan simulasi
                sederhana pembagian harta warisan.
            </p>

        </div>


        <div class="faraid-grid">

            {{-- Informasi --}}
            <div class="faraid-info">

                <span class="section-label">
                    TENTANG FARAID
                </span>

                <h2>
                    Memahami Pembagian Warisan
                </h2>

                <p>
                    Faraid merupakan ilmu yang membahas mengenai
                    pembagian harta warisan kepada ahli waris sesuai
                    dengan ketentuan syariat Islam.
                </p>

                <p>
                    Kalkulator pada halaman ini digunakan sebagai
                    simulasi awal. Untuk kasus waris yang kompleks,
                    disarankan melakukan konsultasi dengan pihak
                    yang memiliki kompetensi di bidang faraid.
                </p>


                <div class="faraid-info-list">

                    <div class="faraid-info-item">
                        <div class="faraid-info-icon">
                            ✓
                        </div>

                        <div>
                            <h3>
                                Data Harta
                            </h3>

                            <p>
                                Masukkan jumlah harta bersih
                                yang akan dibagikan.
                            </p>
                        </div>
                    </div>


                    <div class="faraid-info-item">
                        <div class="faraid-info-icon">
                            ✓
                        </div>

                        <div>
                            <h3>
                                Data Ahli Waris
                            </h3>

                            <p>
                                Tentukan anggota keluarga yang
                                termasuk ahli waris.
                            </p>
                        </div>
                    </div>


                    <div class="faraid-info-item">
                        <div class="faraid-info-icon">
                            ✓
                        </div>

                        <div>
                            <h3>
                                Hasil Simulasi
                            </h3>

                            <p>
                                Hasil perhitungan ditampilkan
                                sebagai estimasi pembagian.
                            </p>
                        </div>
                    </div>

                </div>

            </div>


            {{-- Calculator --}}
            <div class="faraid-calculator">

                <div class="faraid-calculator-header">

                    <h2>
                        Form Perhitungan
                    </h2>

                    <p>
                        Masukkan data warisan
                    </p>

                </div>


                <form id="faraidForm">

                    <div class="faraid-input-group">

                        <label for="totalHarta">
                            Total Harta Warisan
                        </label>

                        <div class="faraid-input-money">

                            <span>
                                Rp
                            </span>

                            <input
                                type="number"
                                id="totalHarta"
                                placeholder="Contoh: 100000000"
                                min="0"
                            >

                        </div>

                    </div>


                    <div class="faraid-input-group">

                        <label for="biaya">
                            Biaya / Hutang
                        </label>

                        <div class="faraid-input-money">

                            <span>
                                Rp
                            </span>

                            <input
                                type="number"
                                id="biaya"
                                placeholder="Contoh: 10000000"
                                min="0"
                            >

                        </div>

                    </div>


                    <div class="faraid-input-group">

                        <label for="anakLaki">
                            Jumlah Anak Laki-laki
                        </label>

                        <input
                            type="number"
                            id="anakLaki"
                            value="0"
                            min="0"
                        >

                    </div>


                    <div class="faraid-input-group">

                        <label for="anakPerempuan">
                            Jumlah Anak Perempuan
                        </label>

                        <input
                            type="number"
                            id="anakPerempuan"
                            value="0"
                            min="0"
                        >

                    </div>


                    <div class="faraid-input-group">

                        <label for="istri">
                            Jumlah Istri
                        </label>

                        <input
                            type="number"
                            id="istri"
                            value="0"
                            min="0"
                            max="1"
                        >

                    </div>


                    <div class="faraid-input-group">

                        <label for="suami">
                            Apakah Ada Suami?
                        </label>

                        <select id="suami">

                            <option value="0">
                                Tidak
                            </option>

                            <option value="1">
                                Ya
                            </option>

                        </select>

                    </div>


                    <button
                        type="button"
                        class="faraid-submit"
                        onclick="hitungFaraid()"
                    >
                        Hitung Pembagian
                    </button>

                </form>


                <div
                    id="faraidResult"
                    class="faraid-result"
                    style="display:none;"
                >

                    <h3>
                        Hasil Simulasi
                    </h3>

                    <div id="hasilFaraid"></div>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="faraid-note-section">

    <div class="container">

        <div class="faraid-note">

            <div class="faraid-note-icon">
                ℹ
            </div>

            <div>

                <h3>
                    Catatan Penting
                </h3>

                <p>
                    Hasil kalkulator ini merupakan simulasi sederhana
                    dan bukan keputusan hukum atau fatwa mengenai
                    pembagian warisan. Untuk kondisi keluarga yang
                    kompleks, silakan melakukan konsultasi lebih lanjut.
                </p>

            </div>

        </div>

    </div>

</section>


<section class="faraid-cta-section">

    <div class="container">

        <div class="faraid-cta">

            <div>

                <span class="section-label">
                    BUTUH PENJELASAN?
                </span>

                <h2>
                    Konsultasikan Persoalan Waris Anda
                </h2>

                <p>
                    Jika membutuhkan penjelasan lebih lanjut mengenai
                    faraid, Anda dapat menggunakan layanan konsultasi
                    syariah PUSDAI Jawa Barat.
                </p>

            </div>

            <a
                href="{{ route('konsultasi') }}"
                class="primary-button"
            >
                Konsultasi Syariah
            </a>

        </div>

    </div>

</section>


<script>

function formatRupiah(angka) {

    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
        maximumFractionDigits: 0
    }).format(angka);

}


function hitungFaraid() {

    const totalHarta =
        Number(document.getElementById('totalHarta').value) || 0;

    const biaya =
        Number(document.getElementById('biaya').value) || 0;

    const anakLaki =
        Number(document.getElementById('anakLaki').value) || 0;

    const anakPerempuan =
        Number(document.getElementById('anakPerempuan').value) || 0;

    const istri =
        Number(document.getElementById('istri').value) || 0;

    const suami =
        Number(document.getElementById('suami').value) || 0;


    if (totalHarta <= 0) {

        alert('Silakan masukkan total harta warisan.');

        return;

    }


    const hartaBersih =
        Math.max(totalHarta - biaya, 0);


    if (hartaBersih <= 0) {

        alert('Harta bersih tidak mencukupi untuk dibagikan.');

        return;

    }


    let html = `
        <div class="faraid-result-total">
            <span>Harta Bersih</span>
            <strong>${formatRupiah(hartaBersih)}</strong>
        </div>
    `;


    /*
     * Simulasi sederhana.
     *
     * Jika terdapat anak laki-laki dan perempuan,
     * bagian anak laki-laki dihitung dua kali bagian
     * anak perempuan.
     */


    const jumlahAnak =
        anakLaki + anakPerempuan;


    if (jumlahAnak > 0) {

        const totalBagian =
            (anakLaki * 2) + anakPerempuan;

        const nilaiBagian =
            hartaBersih / totalBagian;


        if (anakLaki > 0) {

            const bagianLaki =
                nilaiBagian * 2;

            html += `
                <div class="faraid-result-item">
                    <span>Anak Laki-laki</span>
                    <strong>
                        ${formatRupiah(bagianLaki)}
                        / orang
                    </strong>
                </div>
            `;

        }


        if (anakPerempuan > 0) {

            const bagianPerempuan =
                nilaiBagian;

            html += `
                <div class="faraid-result-item">
                    <span>Anak Perempuan</span>
                    <strong>
                        ${formatRupiah(bagianPerempuan)}
                        / orang
                    </strong>
                </div>
            `;

        }

    }


    if (istri > 0) {

        const bagianIstri =
            hartaBersih * 0.125;

        html += `
            <div class="faraid-result-item">
                <span>Istri</span>
                <strong>
                    ${formatRupiah(bagianIstri)}
                </strong>
            </div>
        `;

    }


    if (suami > 0) {

        const bagianSuami =
            hartaBersih * 0.25;

        html += `
            <div class="faraid-result-item">
                <span>Suami</span>
                <strong>
                    ${formatRupiah(bagianSuami)}
                </strong>
            </div>
        `;

    }


    document.getElementById('hasilFaraid').innerHTML = html;

    document.getElementById('faraidResult').style.display = 'block';

}

</script>

@endsection