<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('admin.announcement.index', [
            'announcements' => Announcement::latest()->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.announcement.form', ['announcement' => new Announcement()]);
    }

    public function store(Request $request)
    {
        Announcement::create($this->validated($request));

        return redirect()->route('admin.announcement.index')
            ->with('status', 'Informasi berhasil ditambahkan.');
    }

    public function edit(Announcement $announcement)
    {
        return view('admin.announcement.form', ['announcement' => $announcement]);
    }

    public function update(Request $request, Announcement $announcement)
    {
        $announcement->update($this->validated($request));

        return redirect()->route('admin.announcement.index')
            ->with('status', 'Informasi berhasil diperbarui.');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return redirect()->route('admin.announcement.index')
            ->with('status', 'Informasi dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'isi' => ['required', 'string', 'max:1000'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        return $data;
    }
}
