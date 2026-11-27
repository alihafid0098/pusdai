@extends('admin.layout')

@section('title', 'Galeri')
@section('heading', 'Galeri Foto')
@section('subheading', 'Unggah dan kelola foto kegiatan')

@section('content')

<div class="admin-card">

    <div class="admin-card-head">
        <h2>Daftar Foto</h2>
        <a href="{{ route('admin.gallery.create') }}" class="admin-btn">+ Unggah Foto</a>
    </div>

    @if ($galleries->isEmpty())
        <p class="admin-empty">Belum ada foto. Unggah foto kegiatan untuk ditampilkan di halaman Galeri.</p>
    @else
        <div class="thumb-grid">
            @foreach ($galleries as $gallery)
                <figure class="thumb-card">
                    <img src="{{ $gallery->gambar_url }}" alt="{{ $gallery->judul }}">

                    <figcaption>
                        <strong>{{ $gallery->judul }}</strong>
                        @if ($gallery->kategori)
                            <small>{{ $gallery->kategori }}</small>
                        @endif

                        <div class="thumb-actions">
                            <a href="{{ route('admin.gallery.edit', $gallery) }}">Edit</a>

                            <form method="POST" action="{{ route('admin.gallery.destroy', $gallery) }}" onsubmit="return confirm('Hapus foto ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Hapus</button>
                            </form>
                        </div>
                    </figcaption>
                </figure>
            @endforeach
        </div>

        <div class="admin-pagination">{{ $galleries->links() }}</div>
    @endif

</div>

@endsection
