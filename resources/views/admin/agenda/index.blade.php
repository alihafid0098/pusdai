@extends('admin.layout')

@section('title', 'Agenda')
@section('heading', 'Agenda & Kajian')
@section('subheading', 'Kelola jadwal kajian rutin dan kegiatan PUSDAI')

@section('content')

<div class="admin-card">

    <div class="admin-card-head">
        <h2>Daftar Agenda</h2>
        <a href="{{ route('admin.agenda.create') }}" class="admin-btn">+ Tambah Agenda</a>
    </div>

    @if ($agendas->isEmpty())
        <p class="admin-empty">Belum ada agenda.</p>
    @else
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Jenis</th>
                        <th>Jadwal</th>
                        <th>Lokasi</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($agendas as $agenda)
                        <tr>
                            <td>
                                <strong>{{ $agenda->judul }}</strong>
                                @if ($agenda->pemateri)
                                    <small>{{ $agenda->pemateri }}</small>
                                @endif
                            </td>
                            <td>{{ $agenda->is_rutin ? 'Kajian Rutin' : 'Kegiatan' }}</td>
                            <td>
                                {{ $agenda->hari ?: ($agenda->tanggal?->format('d M Y') ?? '-') }}
                                @if ($agenda->waktu)
                                    <small>{{ $agenda->waktu }}</small>
                                @endif
                            </td>
                            <td>{{ $agenda->lokasi ?: '-' }}</td>
                            <td>
                                <span class="badge {{ $agenda->is_published ? 'ok' : 'off' }}">
                                    {{ $agenda->is_published ? 'Tampil' : 'Draft' }}
                                </span>
                            </td>
                            <td class="table-actions">
                                <a href="{{ route('admin.agenda.edit', $agenda) }}">Edit</a>

                                <form method="POST" action="{{ route('admin.agenda.destroy', $agenda) }}" onsubmit="return confirm('Hapus agenda ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="admin-pagination">
            {{ $agendas->links() }}
        </div>
    @endif

</div>

@endsection
