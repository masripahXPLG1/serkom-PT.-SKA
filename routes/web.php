<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfilController;
use App\Http\Controllers\Admin\ArtikelController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\PesanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ---------- Publik ----------
Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/profil', [LandingController::class, 'profil'])->name('profil');
Route::post('/kirim-pesan', [LandingController::class, 'kirimPesan'])
    ->middleware('throttle:5,1')   // maksimal 5 pesan per menit per pengunjung (anti-spam)
    ->name('pesan.kirim');


// Alamat lama tetap berfungsi, diarahkan ke /profil
Route::redirect('/tentang', '/profil');
Route::get('/produk', [LandingController::class, 'produk'])->name('produk.public');
Route::get('/galeri', [LandingController::class, 'galeri'])->name('galeri.public');
Route::get('/artikel', [LandingController::class, 'artikel'])->name('artikel.public');
Route::get('/artikel/{artikel}', [LandingController::class, 'artikelDetail'])->name('artikel.detail');
Route::post('/kirim-pesan', [LandingController::class, 'kirimPesan'])->name('pesan.kirim');

// ---------- Admin ----------
// Dashboard bawaan Breeze diarahkan ke modul Produk
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('produk', ProdukController::class);
        Route::resource('artikel', ArtikelController::class);
        Route::resource('galeri', GaleriController::class);
        Route::get('profil', [ProfilController::class, 'edit'])->name('profil.edit');
        Route::put('profil', [ProfilController::class, 'update'])->name('profil.update');
        Route::resource('pesan', PesanController::class)->only(['index', 'show', 'destroy']);
    });
});

require __DIR__ . '/auth.php';