<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PusdaiController;
use App\Http\Controllers\ChatAiController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\AgendaController as AdminAgendaController;
use App\Http\Controllers\Admin\AnnouncementController as AdminAnnouncementController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;

Route::get('/', [PusdaiController::class, 'beranda'])->name('beranda');

// API Chat AI
Route::post('/api/chat', [ChatAiController::class, 'chat'])
    ->middleware('throttle:20,1')
    ->name('api.chat');

Route::get('/sejarah', [PusdaiController::class, 'sejarah'])->name('sejarah');

Route::get('/profil', [PusdaiController::class, 'profil'])->name('profil');

Route::get('/layanan', [PusdaiController::class, 'layanan'])->name('layanan');

Route::get('/layanan/sewa', [PusdaiController::class, 'sewa'])->name('layanan.sewa');

Route::get('/layanan/jenazah', [PusdaiController::class, 'jenazah'])->name('layanan.jenazah');

Route::get('/streaming', [PusdaiController::class, 'streaming'])->name('streaming');

Route::get('/academy', [PusdaiController::class, 'academy'])->name('academy');

Route::get('/galeri', [PusdaiController::class, 'galeri'])->name('galeri');

Route::get('/berita', [PusdaiController::class, 'berita'])->name('berita');

Route::get('/berita/{slug}', [PusdaiController::class, 'beritaDetail'])->name('berita.detail');

Route::get('/agenda', [PusdaiController::class, 'agenda'])->name('agenda');

Route::get('/donasi', [PusdaiController::class, 'donasi'])->name('donasi');

Route::get('/kontak', [PusdaiController::class, 'kontak'])->name('kontak');

Route::get('/konsultasi', [PusdaiController::class, 'konsultasi'])->name('konsultasi');

Route::get('/faraid', [PusdaiController::class, 'faraid'])->name('faraid');

Route::get('/perpustakaan', [PusdaiController::class, 'perpustakaan'])->name('perpustakaan');

Route::get('/sitemap.xml', [PusdaiController::class, 'sitemap'])->name('sitemap');


// ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login'])
        ->middleware('throttle:6,1')
        ->name('admin.login.store');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('agenda', AdminAgendaController::class)
            ->except(['show'])
            ->names('admin.agenda');
        Route::resource('berita', AdminArticleController::class)
            ->except(['show'])
            ->parameters(['berita' => 'article'])
            ->names('admin.article');
        Route::resource('galeri', AdminGalleryController::class)
            ->except(['show'])
            ->parameters(['galeri' => 'gallery'])
            ->names('admin.gallery');
        Route::resource('informasi', AdminAnnouncementController::class)
            ->except(['show'])
            ->parameters(['informasi' => 'announcement'])
            ->names('admin.announcement');
    });
});
