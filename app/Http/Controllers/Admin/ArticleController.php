<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin.article.index', [
            'articles' => Article::latest('published_at')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.article.form', ['article' => new Article()]);
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['slug'] = Str::slug($data['judul']).'-'.Str::lower(Str::random(4));

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('articles', 'public');
        }

        Article::create($data);

        return redirect()->route('admin.article.index')
            ->with('status', 'Berita berhasil disimpan.');
    }

    public function edit(Article $article)
    {
        return view('admin.article.form', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $data = $this->validated($request);

        if ($request->hasFile('gambar')) {
            if ($article->gambar) {
                Storage::disk('public')->delete($article->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('articles', 'public');
        }

        if ($request->boolean('hapus_gambar') && $article->gambar) {
            Storage::disk('public')->delete($article->gambar);
            $data['gambar'] = null;
        }

        $article->update($data);

        return redirect()->route('admin.article.index')
            ->with('status', 'Berita berhasil diperbarui.');
    }

    public function destroy(Article $article)
    {
        if ($article->gambar) {
            Storage::disk('public')->delete($article->gambar);
        }

        $article->delete();

        return redirect()->route('admin.article.index')
            ->with('status', 'Berita dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:180'],
            'kategori' => ['required', 'string', 'max:60'],
            'penulis' => ['nullable', 'string', 'max:100'],
            'ringkasan' => ['nullable', 'string', 'max:500'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'max:4096'],
        ]);

        unset($data['gambar']);

        $data['is_published'] = $request->boolean('is_published');

        if ($request->filled('published_at')) {
            $data['published_at'] = $request->date('published_at');
        }

        return $data;
    }
}
