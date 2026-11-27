@extends('layouts.app')

@section('title', 'Agenda - PUSDAI Jawa Barat')

@section('content')

<section class="inner-hero">
    <div class="inner-hero-overlay"></div>

    <div class="container inner-hero-content">
        <span class="hero-badge">AGENDA PUSDAI</span>

        <h1>Agenda &amp; Kajian</h1>

        <p>
            Jadwal kajian rutin mingguan serta kegiatan keislaman yang
            diselenggarakan PUSDAI Jawa Barat.
        </p>
    </div>
</section>

{{-- KAJIAN RUTIN --}}
<section class="agenda-page-section">
    <div class="container">

        <div class="section-heading center">
            <span class="section-label">KAJIAN RUTIN</span>

            <h2>Jadwal Kajian Mingguan</h2>

            <p>
                Terbuka untuk umum dan gratis. Jadwal berlaku setiap pekan
                di Ruang Multimedia dan ruang kelas PUSDAI.
            </p>
        </div>

        @if ($kajianRutin->isEmpty())
            <p class="agenda-empty">
                Jadwal kajian rutin belum diisi. Silakan hubungi sekretariat
                PUSDAI untuk informasi terbaru.
            </p>
        @else
            <div class="jadwal-grid">

                @foreach ($kajianRutin as $kajian)
                    <article class="jadwal-card">
                        <span class="jadwal-hari">{{ $kajian->hari ?: 'Rutin' }}</span>

                        <h3>{{ $kajian->judul }}</h3>

                        @if ($kajian->pemateri)
                            <p class="jadwal-ustadz">{{ $kajian->pemateri }}</p>
                        @endif

                        <ul>
                            @if ($kajian->waktu)
                                <li>{{ $kajian->waktu }}</li>
                            @endif
                            @if ($kajian->lokasi)
                                <li>{{ $kajian->lokasi }}</li>
                            @endif
                        </ul>
                    </article>
                @endforeach

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
        @endif

    </div>
</section>

{{-- KEGIATAN --}}
<section class="agenda-events-section">
    <div class="container">

        <div class="section-heading center">
            <span class="section-label">AGENDA KEGIATAN</span>

            <h2>Kegiatan PUSDAI</h2>

            <p>
                Seminar, tablig akbar, kegiatan sosial, dan program
                keumatan lainnya.
            </p>
        </div>

        @if ($kegiatan->isEmpty())
            <p class="agenda-empty">
                Belum ada kegiatan terjadwal. Pantau terus halaman ini atau
                ikuti media sosial PUSDAI untuk informasi terbaru.
            </p>
        @else
            <div class="agenda-list">

                @foreach ($kegiatan as $item)
                    <div class="agenda-card">

                        <div class="agenda-date">
                            <span class="agenda-day">
                                {{ $item->tanggal ? $item->tanggal->format('d') : '—' }}
                            </span>
                            <span class="agenda-month">
                                {{ $item->tanggal ? strtoupper($item->tanggal->translatedFormat('M')) : 'TBA' }}
                            </span>
                            <span class="agenda-year">
                                {{ $item->tanggal ? $item->tanggal->format('Y') : '' }}
                            </span>
                        </div>

                        <div class="agenda-content">

                            <span class="agenda-category">
                                {{ $item->kategori }}
                            </span>

                            <h3>{{ $item->judul }}</h3>

                            @if ($item->ringkasan)
                                <p>{{ $item->ringkasan }}</p>
                            @endif

                            <div class="agenda-info">
                                @if ($item->waktu)
                                    <span>🕐 {{ $item->waktu }}</span>
                                @endif

                                @if ($item->lokasi)
                                    <span>📍 {{ $item->lokasi }}</span>
                                @endif

                                @if ($item->pemateri)
                                    <span>🎙️ {{ $item->pemateri }}</span>
                                @endif
                            </div>

                        </div>

                    </div>
                @endforeach

            </div>
        @endif

        <div class="agenda-cta">
            <div>
                <span class="section-label">INFORMASI KEGIATAN</span>
                <h2>Ingin mengetahui agenda lainnya?</h2>
                <p>
                    Hubungi PUSDAI Jawa Barat untuk informasi lebih lanjut
                    mengenai kegiatan dan program yang tersedia.
                </p>
            </div>

            <a href="{{ route('kontak') }}" class="btn btn-primary">Hubungi Kami</a>
        </div>

    </div>
</section>

@endsection
