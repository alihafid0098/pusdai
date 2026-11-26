@extends('layouts.app')

@section('title', 'Perpustakaan Digital - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">

        <span class="hero-badge">
            LAYANAN UMAT
        </span>

        <h1>
            Perpustakaan Digital
        </h1>

        <p>
            Akses berbagai koleksi buku dan referensi keislaman
            untuk mendukung pembelajaran dan pengembangan wawasan umat.
        </p>

    </div>
</section>


<section class="library-section">

    <div class="container">

        <div class="section-heading center">

            <span class="section-label">
                PERPUSTAKAAN PUSDAI
            </span>

            <h2>
                Koleksi Bacaan Keislaman
            </h2>

            <p>
                Temukan berbagai referensi dan bahan bacaan yang
                dapat membantu menambah wawasan keislaman.
            </p>

        </div>


        {{-- Search --}}

        <div class="library-search">

            <input
                type="text"
                id="librarySearch"
                placeholder="Cari buku atau judul..."
                onkeyup="searchLibrary()"
            >

            <button type="button">
                🔍 Cari
            </button>

        </div>


        {{-- Category --}}

        <div class="library-categories">

            <button
                class="library-category active"
                onclick="filterLibrary('all', this)"
            >
                Semua
            </button>

            <button
                class="library-category"
                onclick="filterLibrary('alquran', this)"
            >
                Al-Qur'an
            </button>

            <button
                class="library-category"
                onclick="filterLibrary('hadis', this)"
            >
                Hadis
            </button>

            <button
                class="library-category"
                onclick="filterLibrary('fiqih', this)"
            >
                Fiqih
            </button>

            <button
                class="library-category"
                onclick="filterLibrary('sejarah', this)"
            >
                Sejarah Islam
            </button>

            <button
                class="library-category"
                onclick="filterLibrary('umum', this)"
            >
                Islam Umum
            </button>

        </div>


        {{-- Books --}}

        <div class="library-grid" id="libraryGrid">


            <article
                class="library-card"
                data-category="alquran"
                data-title="Al Quran dan Terjemahannya"
            >

                <div class="library-cover">

                    <div class="library-cover-symbol">
                        ق
                    </div>

                    <span>
                        AL-QUR'AN
                    </span>

                </div>

                <div class="library-content">

                    <span class="library-tag">
                        Al-Qur'an
                    </span>

                    <h3>
                        Al-Qur'an dan Terjemahannya
                    </h3>

                    <p>
                        Referensi Al-Qur'an beserta terjemahan
                        untuk membantu memahami kandungan ayat.
                    </p>

                    <a href="#" class="library-button">
                        Lihat Koleksi
                    </a>

                </div>

            </article>


            <article
                class="library-card"
                data-category="hadis"
                data-title="Kumpulan Hadis Pilihan"
            >

                <div class="library-cover">

                    <div class="library-cover-symbol">
                        ح
                    </div>

                    <span>
                        HADIS
                    </span>

                </div>

                <div class="library-content">

                    <span class="library-tag">
                        Hadis
                    </span>

                    <h3>
                        Kumpulan Hadis Pilihan
                    </h3>

                    <p>
                        Koleksi hadis pilihan sebagai bahan
                        pembelajaran dan referensi umat.
                    </p>

                    <a href="#" class="library-button">
                        Lihat Koleksi
                    </a>

                </div>

            </article>


            <article
                class="library-card"
                data-category="fiqih"
                data-title="Fiqih Ibadah"
            >

                <div class="library-cover">

                    <div class="library-cover-symbol">
                        ف
                    </div>

                    <span>
                        FIQIH
                    </span>

                </div>

                <div class="library-content">

                    <span class="library-tag">
                        Fiqih
                    </span>

                    <h3>
                        Fiqih Ibadah
                    </h3>

                    <p>
                        Referensi mengenai berbagai ketentuan
                        ibadah dalam kehidupan sehari-hari.
                    </p>

                    <a href="#" class="library-button">
                        Lihat Koleksi
                    </a>

                </div>

            </article>


            <article
                class="library-card"
                data-category="sejarah"
                data-title="Sejarah Peradaban Islam"
            >

                <div class="library-cover">

                    <div class="library-cover-symbol">
                        م
                    </div>

                    <span>
                        SEJARAH
                    </span>

                </div>

                <div class="library-content">

                    <span class="library-tag">
                        Sejarah Islam
                    </span>

                    <h3>
                        Sejarah Peradaban Islam
                    </h3>

                    <p>
                        Mengenal perkembangan peradaban Islam
                        dari masa ke masa.
                    </p>

                    <a href="#" class="library-button">
                        Lihat Koleksi
                    </a>

                </div>

            </article>


            <article
                class="library-card"
                data-category="umum"
                data-title="Islam dan Kehidupan"
            >

                <div class="library-cover">

                    <div class="library-cover-symbol">
                        إ
                    </div>

                    <span>
                        ISLAM
                    </span>

                </div>

                <div class="library-content">

                    <span class="library-tag">
                        Islam Umum
                    </span>

                    <h3>
                        Islam dan Kehidupan
                    </h3>

                    <p>
                        Bacaan mengenai penerapan nilai-nilai Islam
                        dalam kehidupan bermasyarakat.
                    </p>

                    <a href="#" class="library-button">
                        Lihat Koleksi
                    </a>

                </div>

            </article>


            <article
                class="library-card"
                data-category="fiqih"
                data-title="Fiqih Muamalah"
            >

                <div class="library-cover">

                    <div class="library-cover-symbol">
                        م
                    </div>

                    <span>
                        MUAMALAH
                    </span>

                </div>

                <div class="library-content">

                    <span class="library-tag">
                        Fiqih
                    </span>

                    <h3>
                        Fiqih Muamalah
                    </h3>

                    <p>
                        Pembahasan mengenai hubungan dan transaksi
                        antar manusia berdasarkan prinsip Islam.
                    </p>

                    <a href="#" class="library-button">
                        Lihat Koleksi
                    </a>

                </div>

            </article>

        </div>


        <div
            id="libraryEmpty"
            class="library-empty"
            style="display:none;"
        >

            <div class="library-empty-icon">
                📚
            </div>

            <h3>
                Koleksi Tidak Ditemukan
            </h3>

            <p>
                Tidak ada koleksi yang sesuai dengan pencarian Anda.
            </p>

        </div>

    </div>

</section>


<section class="library-info-section">

    <div class="container">

        <div class="library-info">

            <div class="library-info-icon">
                📖
            </div>

            <div>

                <span class="section-label">
                    INFORMASI
                </span>

                <h2>
                    Perpustakaan Digital PUSDAI
                </h2>

                <p>
                    Perpustakaan digital diharapkan dapat menjadi
                    sarana bagi masyarakat untuk memperoleh bahan
                    bacaan dan referensi keislaman secara lebih mudah.
                </p>

            </div>

        </div>

    </div>

</section>


<section class="library-cta-section">

    <div class="container">

        <div class="library-cta">

            <div>

                <span class="section-label">
                    BUTUH INFORMASI?
                </span>

                <h2>
                    Hubungi PUSDAI Jawa Barat
                </h2>

                <p>
                    Untuk informasi mengenai koleksi dan layanan
                    perpustakaan, silakan menghubungi kami.
                </p>

            </div>

            <a
                href="{{ route('kontak') }}"
                class="primary-button"
            >
                Hubungi Kami
            </a>

        </div>

    </div>

</section>


<script>

function filterLibrary(category, button) {

    const cards =
        document.querySelectorAll('.library-card');

    const buttons =
        document.querySelectorAll('.library-category');

    buttons.forEach(function(btn) {
        btn.classList.remove('active');
    });

    button.classList.add('active');


    let visible = 0;


    cards.forEach(function(card) {

        const cardCategory =
            card.getAttribute('data-category');


        if (
            category === 'all' ||
            cardCategory === category
        ) {

            card.style.display = '';

            visible++;

        } else {

            card.style.display = 'none';

        }

    });


    document.getElementById('libraryEmpty').style.display =
        visible === 0 ? 'block' : 'none';

}


function searchLibrary() {

    const keyword =
        document.getElementById('librarySearch')
        .value
        .toLowerCase();

    const cards =
        document.querySelectorAll('.library-card');

    let visible = 0;


    cards.forEach(function(card) {

        const title =
            card.getAttribute('data-title')
            .toLowerCase();

        const content =
            card.innerText.toLowerCase();


        if (
            title.includes(keyword) ||
            content.includes(keyword)
        ) {

            card.style.display = '';

            visible++;

        } else {

            card.style.display = 'none';

        }

    });


    document.getElementById('libraryEmpty').style.display =
        visible === 0 ? 'block' : 'none';

}

</script>

@endsection