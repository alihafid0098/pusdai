<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PusdaiController;
use App\Http\Controllers\ChatAiController;

Route::get('/', [PusdaiController::class, 'beranda'])->name('beranda');

// API Chat AI
Route::post('/api/chat', [ChatAiController::class, 'chat'])->name('api.chat');

Route::get('/sejarah', [PusdaiController::class, 'sejarah'])->name('sejarah');

Route::get('/profil', [PusdaiController::class, 'profil'])->name('profil');

Route::get('/layanan', [PusdaiController::class, 'layanan'])->name('layanan');

Route::get('/galeri', [PusdaiController::class, 'galeri'])->name('galeri');

Route::get('/agenda', [PusdaiController::class, 'agenda'])->name('agenda');

Route::get('/donasi', [PusdaiController::class, 'donasi'])->name('donasi');

Route::get('/kontak', [PusdaiController::class, 'kontak'])->name('kontak');

Route::get('/konsultasi', [PusdaiController::class, 'konsultasi'])->name('konsultasi');

Route::get('/faraid', [PusdaiController::class, 'faraid'])->name('faraid');

Route::get('/perpustakaan', [PusdaiController::class, 'perpustakaan'])->name('perpustakaan');
