@extends('admin.layout')

@section('title', 'Berita')
@section('heading', 'Berita & Artikel')
@section('subheading', 'Tulis dan kelola berita yang tampil di situs')

@section('content')

<div class="admin-card">

    <div class="admin-card-head">
        <h2>Daftar Berita</h2>
        <a href="{{ route('admin.article.create') }}" class="admin-btn">+ Tulis Berita</a>
    </div>

    @if ($articles->isEmpty())
        <p class="admin-empty">Belum ada berita. Klik "Tulis Berita" untuk memulai.</p>
    @else
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Kategori</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>
                                <strong>{{ $article->judul }}</strong>
                                <small>{{ $article->penulis ?: 'Tanpa penulis' }}</small>
                            </td>
                            <td>{{ $article->kategori }}</td>
                            <td>{{ $article->published_at?->format('d M Y') ?? '-' }}</td>
                            <td>
                                <span class="badge {{ $article->is_published ? 'ok' : 'off' }}">
                                    {{ $article->is_published ? 'Terbit' : 'Draft' }}
                                </span>
                            </td>
                            <td class="table-actions">
                                <a href="{{ route('admin.article.edit', $article) }}">Edit</a>

                                <form method="POST" action="{{ route('admin.article.destroy', $article) }}" onsubmit="return confirm('Hapus berita ini?')">
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

        <div class="admin-pagination">{{ $articles->links() }}</div>
    @endif

</div>

@endsection
