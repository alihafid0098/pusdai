@extends('admin.layout')

@section('title', $agenda->exists ? 'Edit Agenda' : 'Tambah Agenda')
@section('heading', $agenda->exists ? 'Edit Agenda' : 'Tambah Agenda')
@section('subheading', 'Isi detail agenda atau kajian yang akan tampil di situs')

@section('content')

<div class="admin-card">

    <form method="POST" action="{{ $agenda->exists ? route('admin.agenda.update', $agenda) : route('admin.agenda.store') }}">
        @csrf
        @if ($agenda->exists)
            @method('PUT')
        @endif

        <div class="form-row">
            <div class="form-group">
                <label for="judul">Judul Agenda *</label>
                <input type="text" id="judul" name="judul" value="{{ old('judul', $agenda->judul) }}" required maxlength="150">
            </div>

            <div class="form-group">
                <label for="kategori">Kategori *</label>
                <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $agenda->kategori ?? 'Kajian Rutin') }}" required maxlength="60">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="pemateri">Pemateri / Ustadz</label>
                <input type="text" id="pemateri" name="pemateri" value="{{ old('pemateri', $agenda->pemateri) }}" maxlength="120">
            </div>

            <div class="form-group">
                <label for="lokasi">Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $agenda->lokasi) }}" maxlength="120">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="hari">Hari (untuk kajian rutin)</label>
                <select id="hari" name="hari">
                    <option value="">-</option>
                    @foreach (['Senin', 'Selasa', 'Rabu', 'Kamis', "Jum'at", 'Sabtu', 'Ahad'] as $hari)
                        <option value="{{ $hari }}" @selected(old('hari', $agenda->hari) === $hari)>{{ $hari }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="waktu">Waktu</label>
                <input type="text" id="waktu" name="waktu" value="{{ old('waktu', $agenda->waktu) }}" placeholder="09.00 – 11.30 WIB" maxlength="120">
            </div>

            <div class="form-group">
                <label for="tanggal">Tanggal (untuk kegiatan)</label>
                <input type="date" id="tanggal" name="tanggal" value="{{ old('tanggal', $agenda->tanggal?->format('Y-m-d')) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="ringkasan">Ringkasan / Keterangan</label>
            <textarea id="ringkasan" name="ringkasan" rows="4" maxlength="1000">{{ old('ringkasan', $agenda->ringkasan) }}</textarea>
        </div>

        <div class="form-checks">
            <label><input type="checkbox" name="is_rutin" value="1" @checked(old('is_rutin', $agenda->is_rutin))> Kajian rutin mingguan</label>
            <label><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $agenda->is_published ?? true))> Tampilkan di situs</label>
        </div>

        <div class="form-actions">
            <button type="submit" class="admin-btn">{{ $agenda->exists ? 'Simpan Perubahan' : 'Simpan Agenda' }}</button>
            <a href="{{ route('admin.agenda.index') }}" class="admin-btn outline">Batal</a>
        </div>

    </form>

</div>

@endsection
