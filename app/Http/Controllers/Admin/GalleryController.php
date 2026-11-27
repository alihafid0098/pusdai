<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        return view('admin.gallery.index', [
            'galleries' => Gallery::orderBy('urutan')->latest('id')->paginate(18),
        ]);
    }

    public function create()
    {
        return view('admin.gallery.form', ['gallery' => new Gallery()]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'kategori' => ['nullable', 'string', 'max:60'],
            'urutan' => ['nullable', 'integer', 'min:0', 'max:999'],
            'gambar' => ['required', 'image', 'max:5120'],
        ]);

        $data['gambar'] = $request->file('gambar')->store('galleries', 'public');
        $data['urutan'] = $data['urutan'] ?? 0;

        Gallery::create($data);

        return redirect()->route('admin.gallery.index')
            ->with('status', 'Foto berhasil diunggah.');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.form', ['gallery' => $gallery]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'kategori' => ['nullable', 'string', 'max:60'],
            'urutan' => ['nullable', 'integer', 'min:0', 'max:999'],
            'gambar' => ['nullable', 'image', 'max:5120'],
        ]);

        if ($request->hasFile('gambar')) {
            Storage::disk('public')->delete($gallery->gambar);
            $data['gambar'] = $request->file('gambar')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.gallery.index')
            ->with('status', 'Foto berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery)
    {
        Storage::disk('public')->delete($gallery->gambar);
        $gallery->delete();

        return redirect()->route('admin.gallery.index')
            ->with('status', 'Foto dihapus.');
    }
}
