<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function index()
    {
        return view('admin.agenda.index', [
            'agendas' => Agenda::orderByDesc('is_rutin')->orderBy('hari')->orderByDesc('tanggal')->paginate(15),
        ]);
    }

    public function create()
    {
        return view('admin.agenda.form', ['agenda' => new Agenda()]);
    }

    public function store(Request $request)
    {
        Agenda::create($this->validated($request));

        return redirect()->route('admin.agenda.index')
            ->with('status', 'Agenda berhasil ditambahkan.');
    }

    public function edit(Agenda $agenda)
    {
        return view('admin.agenda.form', ['agenda' => $agenda]);
    }

    public function update(Request $request, Agenda $agenda)
    {
        $agenda->update($this->validated($request));

        return redirect()->route('admin.agenda.index')
            ->with('status', 'Agenda berhasil diperbarui.');
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();

        return redirect()->route('admin.agenda.index')
            ->with('status', 'Agenda dihapus.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:150'],
            'kategori' => ['required', 'string', 'max:60'],
            'pemateri' => ['nullable', 'string', 'max:120'],
            'hari' => ['nullable', 'string', 'max:20'],
            'waktu' => ['nullable', 'string', 'max:120'],
            'lokasi' => ['nullable', 'string', 'max:120'],
            'tanggal' => ['nullable', 'date'],
            'ringkasan' => ['nullable', 'string', 'max:1000'],
        ]);

        $data['is_rutin'] = $request->boolean('is_rutin');
        $data['is_published'] = $request->boolean('is_published');

        return $data;
    }
}
