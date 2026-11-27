@extends('admin.layout')

@section('title', 'Informasi Beranda')
@section('heading', 'Informasi Beranda')
@section('subheading', 'Tulisan singkat yang tampil sebagai banner di beranda')

@section('content')

<div class="admin-card">

    <div class="admin-card-head">
        <h2>Daftar Informasi</h2>
        <a href="{{ route('admin.announcement.create') }}" class="admin-btn">+ Tambah Informasi</a>
    </div>

    @if ($announcements->isEmpty())
        <p class="admin-empty">Belum ada informasi. Tambahkan pengumuman singkat untuk ditampilkan di beranda.</p>
    @else
        <div class="table-wrap">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($announcements as $announcement)
                        <tr>
                            <td><strong>{{ $announcement->judul }}</strong></td>
                            <td>{{ \Illuminate\Support\Str::limit($announcement->isi, 90) }}</td>
                            <td>
                                <span class="badge {{ $announcement->is_active ? 'ok' : 'off' }}">
                                    {{ $announcement->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="table-actions">
                                <a href="{{ route('admin.announcement.edit', $announcement) }}">Edit</a>

                                <form method="POST" action="{{ route('admin.announcement.destroy', $announcement) }}" onsubmit="return confirm('Hapus informasi ini?')">
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
            {{ $announcements->links() }}
        </div>
    @endif

</div>

@endsection
