<div class="news-page-grid">

    @forelse($berita as $item)

        <article class="news-page-card">

            <img
                src="{{ $item->gambar }}"
                alt="{{ $item->judul }}"
                class="news-page-image"
            >

            <div class="news-page-content">

                <div class="news-meta">

                    <span class="news-category">
                        {{ $item->kategori }}
                    </span>

                    <span>
                        {{ $item->tanggal->format('d M Y') }}
                    </span>

                </div>

                <h3>
                    {{ $item->judul }}
                </h3>

                <p>
                    {{ $item->ringkasan }}
                </p>

                <a
                    href="{{ route('berita.detail', $item->slug) }}"
                    class="news-detail-link"
                >
                    Baca Selengkapnya →
                </a>

            </div>

        </article>

    @empty

        <div class="news-empty">
            <h3>
                Belum ada berita
            </h3>

            <p>
                Data berita belum tersedia.
            </p>
        </div>

    @endforelse

</div>