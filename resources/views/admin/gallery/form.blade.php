@extends('admin.layout')

@section('title', $gallery->exists ? 'Edit Foto' : 'Unggah Foto')
@section('heading', $gallery->exists ? 'Edit Foto' : 'Unggah Foto')
@section('subheading', 'Foto akan tampil di halaman Galeri situs')

@section('content')

<div class="admin-card">

    <form method="POST" action="{{ $gallery->exists ? route('admin.gallery.update', $gallery) : route('admin.gallery.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($gallery->exists)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="judul">Judul / Keterangan Foto *</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $gallery->judul) }}" required maxlength="150">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="kategori">Kategori</label>
                <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $gallery->kategori) }}" maxlength="60" placeholder="Kegiatan, Arsitektur, dll">
            </div>

            <div class="form-group">
                <label for="urutan">Urutan Tampil</label>
                <input type="number" id="urutan" name="urutan" value="{{ old('urutan', $gallery->urutan ?? 0) }}" min="0" max="999">
            </div>
        </div>

        <div class="form-group">
            <label for="gambar">File Foto {{ $gallery->exists ? '(kosongkan bila tidak diganti)' : '*' }}</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" {{ $gallery->exists ? '' : 'required' }}>
        </div>

        @if ($gallery->gambar)
            <div class="thumb-preview">
                <img src="{{ $gallery->gambar_url }}" alt="{{ $gallery->judul }}">
            </div>
        @endif

        <div class="form-actions">
            <button type="submit" class="admin-btn">{{ $gallery->exists ? 'Simpan Perubahan' : 'Unggah Foto' }}</button>
            <a href="{{ route('admin.gallery.index') }}" class="admin-btn outline">Batal</a>
        </div>

    </form>

</div>

@endsection
