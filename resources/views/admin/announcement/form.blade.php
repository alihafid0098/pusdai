@extends('admin.layout')

@section('title', $announcement->exists ? 'Edit Informasi' : 'Tambah Informasi')
@section('heading', $announcement->exists ? 'Edit Informasi' : 'Tambah Informasi')
@section('subheading', 'Informasi aktif akan tampil sebagai banner di beranda')

@section('content')

<div class="admin-card">

    <form method="POST" action="{{ $announcement->exists ? route('admin.announcement.update', $announcement) : route('admin.announcement.store') }}">
        @csrf
        @if ($announcement->exists)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="judul">Judul Informasi *</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $announcement->judul) }}" required maxlength="150" placeholder="Contoh: Kajian Akbar Awal Bulan">
        </div>

        <div class="form-group">
            <label for="isi">Isi Informasi *</label>
            <textarea id="isi" name="isi" rows="5" required maxlength="1000" placeholder="Tulis informasi singkat yang akan tampil di beranda...">{{ old('isi', $announcement->isi) }}</textarea>
        </div>

        <div class="form-checks">
            <label><input type="checkbox" name="is_active" value="1" @checked(old('is_active', $announcement->is_active ?? true))> Tampilkan di beranda</label>
        </div>

        <div class="form-actions">
            <button type="submit" class="admin-btn">{{ $announcement->exists ? 'Simpan Perubahan' : 'Simpan Informasi' }}</button>
            <a href="{{ route('admin.announcement.index') }}" class="admin-btn outline">Batal</a>
        </div>

    </form>

</div>

@endsection
