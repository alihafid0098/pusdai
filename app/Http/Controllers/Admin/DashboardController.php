<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\Announcement;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalAgenda' => Agenda::count(),
            'totalKajian' => Agenda::where('is_rutin', true)->count(),
            'totalKegiatan' => Agenda::where('is_rutin', false)->count(),
            'totalPengumuman' => Announcement::where('is_active', true)->count(),
            'agendaTerbaru' => Agenda::latest('updated_at')->take(5)->get(),
        ]);
    }
}
