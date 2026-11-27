@extends('admin.layout')

@section('title', $article->exists ? 'Edit Berita' : 'Tulis Berita')
@section('heading', $article->exists ? 'Edit Berita' : 'Tulis Berita')
@section('subheading', 'Isi berita; gambar bisa ditambahkan nanti')

@section('content')

<div class="admin-card">

    <form method="POST" action="{{ $article->exists ? route('admin.article.update', $article) : route('admin.article.store') }}" enctype="multipart/form-data">
        @csrf
        @if ($article->exists)
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="judul">Judul Berita *</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $article->judul) }}" required maxlength="180">
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="kategori">Kategori *</label>
                <input type="text" id="kategori" name="kategori" value="{{ old('kategori', $article->kategori ?? 'Berita') }}" required maxlength="60">
            </div>

            <div class="form-group">
                <label for="penulis">Penulis</label>
                <input type="text" id="penulis" name="penulis" value="{{ old('penulis', $article->penulis) }}" maxlength="100">
            </div>

            <div class="form-group">
                <label for="published_at">Tanggal Terbit</label>
                <input type="date" id="published_at" name="published_at" value="{{ old('published_at', $article->published_at?->format('Y-m-d') ?? now()->format('Y-m-d')) }}">
            </div>
        </div>

        <div class="form-group">
            <label for="ringkasan">Ringkasan Singkat</label>
            <textarea id="ringkasan" name="ringkasan" rows="2" maxlength="500" placeholder="Tampil di kartu berita di halaman depan">{{ old('ringkasan', $article->ringkasan) }}</textarea>
        </div>

        <div class="form-group">
            <label for="isi">Isi Berita *</label>
            <textarea id="isi" name="isi" rows="12" required placeholder="Tulis isi berita di sini...">{{ old('isi', $article->isi) }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="gambar">Gambar Utama (opsional)</label>
                <input type="file" id="gambar" name="gambar" accept="image/*">
                @if ($article->gambar)
                    <div class="thumb-preview">
                        <img src="{{ $article->gambar_url ?? Storage::disk('public')->url($article->gambar) }}" alt="Gambar berita">
                        <label class="thumb-remove">
                            <input type="checkbox" name="hapus_gambar" value="1"> Hapus gambar
                        </label>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-checks">
            <label><input type="checkbox" name="is_published" value="1" @checked(old('is_published', $article->is_published ?? true))> Terbitkan di situs</label>
        </div>

        <div class="form-actions">
            <button type="submit" class="admin-btn">{{ $article->exists ? 'Simpan Perubahan' : 'Simpan Berita' }}</button>
            <a href="{{ route('admin.article.index') }}" class="admin-btn outline">Batal</a>
        </div>

    </form>

</div>

@endsection
