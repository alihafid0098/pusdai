@extends('layouts.app')

@section('title', 'Konsultasi Syariah - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">KONSULTASI SYARIAH</span>

        <h1>Konsultasi Syariah</h1>

        <p>
            Ruang konsultasi untuk membantu masyarakat mendapatkan
            informasi dan pemahaman mengenai berbagai persoalan keislaman.
        </p>
    </div>
</section>


<section class="consultation-section">

    <div class="container">

        <div class="section-heading center">
            <span class="section-label">KONSULTASI UMAT</span>

            <h2>
                Sampaikan Pertanyaan Anda
            </h2>

            <p>
                Sampaikan pertanyaan seputar permasalahan keislaman
                kepada layanan konsultasi PUSDAI Jawa Barat.
            </p>
        </div>


        <div class="consultation-grid">

            {{-- Informasi --}}
            <div class="consultation-info">

                <span class="section-label">
                    LAYANAN KONSULTASI
                </span>

                <h2>
                    Mendapatkan Pemahaman yang Lebih Baik
                </h2>

                <p>
                    Konsultasi syariah dapat menjadi sarana untuk
                    memperoleh informasi mengenai berbagai persoalan
                    kehidupan yang berkaitan dengan nilai dan ajaran Islam.
                </p>


                <div class="consultation-topics">

                    <div class="consultation-topic">
                        <div class="consultation-topic-icon">
                            ☪️
                        </div>

                        <div>
                            <h3>Fiqih</h3>

                            <p>
                                Konsultasi mengenai persoalan fiqih
                                dan ibadah sehari-hari.
                            </p>
                        </div>
                    </div>


                    <div class="consultation-topic">
                        <div class="consultation-topic-icon">
                            💰
                        </div>

                        <div>
                            <h3>Zakat & Muamalah</h3>

                            <p>
                                Pertanyaan mengenai zakat dan persoalan
                                muamalah dalam kehidupan.
                            </p>
                        </div>
                    </div>


                    <div class="consultation-topic">
                        <div class="consultation-topic-icon">
                            👨‍👩‍👧‍👦
                        </div>

                        <div>
                            <h3>Keluarga</h3>

                            <p>
                                Konsultasi mengenai persoalan keluarga
                                dalam perspektif Islam.
                            </p>
                        </div>
                    </div>

                </div>

            </div>


            {{-- Form --}}
            <div class="consultation-form-box">

                <h2>
                    Form Konsultasi
                </h2>

                <p>
                    Isi data dan pertanyaan Anda pada formulir berikut.
                </p>

                <form action="#" method="POST">

                    @csrf

                    <div class="consultation-input-group">

                        <label for="nama">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan nama lengkap"
                        >

                    </div>


                    <div class="consultation-input-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Masukkan email"
                        >

                    </div>


                    <div class="consultation-input-group">

                        <label for="kategori">
                            Kategori Konsultasi
                        </label>

                        <select
                            id="kategori"
                            name="kategori"
                        >
                            <option value="">
                                Pilih kategori
                            </option>

                            <option value="fiqih">
                                Fiqih & Ibadah
                            </option>

                            <option value="zakat">
                                Zakat & Muamalah
                            </option>

                            <option value="keluarga">
                                Keluarga
                            </option>

                            <option value="lainnya">
                                Lainnya
                            </option>
                        </select>

                    </div>


                    <div class="consultation-input-group">

                        <label for="pertanyaan">
                            Pertanyaan
                        </label>

                        <textarea
                            id="pertanyaan"
                            name="pertanyaan"
                            rows="6"
                            placeholder="Tuliskan pertanyaan Anda..."
                        ></textarea>

                    </div>


                    <button
                        type="submit"
                        class="consultation-submit"
                    >
                        Kirim Konsultasi
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>


<section class="consultation-cta-section">

    <div class="container">

        <div class="consultation-cta">

            <div>
                <span class="section-label">
                    BUTUH INFORMASI LAIN?
                </span>

                <h2>
                    Hubungi PUSDAI Jawa Barat
                </h2>

                <p>
                    Untuk informasi lebih lanjut mengenai layanan
                    konsultasi, silakan menghubungi kami.
                </p>
            </div>

            <a href="{{ route('kontak') }}" class="primary-button">
                Hubungi Kami
            </a>

        </div>

    </div>

</section>

@endsection