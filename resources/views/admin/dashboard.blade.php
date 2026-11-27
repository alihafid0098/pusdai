@extends('admin.layout')

@section('title', 'Dashboard')
@section('heading', 'Dashboard')
@section('subheading', 'Ringkasan konten dan pintasan pengelolaan')

@section('content')

<div class="admin-stats">

    <div class="stat-card">
        <span>Total Agenda</span>
        <strong>{{ $totalAgenda }}</strong>
    </div>

    <div class="stat-card">
        <span>Kajian Rutin</span>
        <strong>{{ $totalKajian }}</strong>
    </div>

    <div class="stat-card">
        <span>Kegiatan Terjadwal</span>
        <strong>{{ $totalKegiatan }}</strong>
    </div>

    <div class="stat-card">
        <span>Informasi Aktif</span>
        <strong>{{ $totalPengumuman }}</strong>
    </div>

</div>

<div class="admin-grid-2">

    <section class="admin-card">
        <div class="admin-card-head">
            <h2>Aksi Cepat</h2>
        </div>

        <div class="admin-actions">
            <a href="{{ route('admin.agenda.create') }}" class="admin-btn">+ Tambah Agenda</a>
            <a href="{{ route('admin.announcement.create') }}" class="admin-btn outline">+ Tambah Informasi</a>
        </div>

        <p class="admin-hint">
            Informasi yang aktif akan tampil sebagai banner di beranda.
            Agenda rutin tampil di halaman Agenda dan Pusdai Academy.
        </p>
    </section>

    <section class="admin-card">
        <div class="admin-card-head">
            <h2>Terakhir Diperbarui</h2>
        </div>

        @if ($agendaTerbaru->isEmpty())
            <p class="admin-empty">Belum ada agenda. Mulai dengan menambah agenda baru.</p>
        @else
            <ul class="admin-list">
                @foreach ($agendaTerbaru as $agenda)
                    <li>
                        <div>
                            <strong>{{ $agenda->judul }}</strong>
                            <small>{{ $agenda->is_rutin ? 'Kajian rutin' : 'Kegiatan' }} • {{ $agenda->hari ?: ($agenda->tanggal?->format('d M Y') ?? '-') }}</small>
                        </div>
                        <a href="{{ route('admin.agenda.edit', $agenda) }}">Edit</a>
                    </li>
                @endforeach
            </ul>
        @endif
    </section>

</div>

@endsection
