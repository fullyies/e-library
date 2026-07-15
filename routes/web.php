<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\DetailPeminjamanController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Redirect Awal
|--------------------------------------------------------------------------
*/
Route::get('/', fn() => redirect('/login'));

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Route untuk semua user login (anggota & admin)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Riwayat peminjaman anggota
    Route::get('/riwayat', [PeminjamanController::class,'riwayat'])->name('riwayat');

    // Buku yang bisa dilihat semua user login
    Route::resource('buku', BukuController::class)->only(['index','show']);
});

/*
|--------------------------------------------------------------------------
| Route khusus Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('kategori', KategoriController::class);

    // Admin bisa CRUD buku (selain index & show)
    Route::resource('buku', BukuController::class)->except(['index','show']);

    // CRUD peminjaman
    Route::resource('peminjaman', PeminjamanController::class);

    // Detail peminjaman (tambah/hapus buku)
    Route::post('/detail-peminjaman', [DetailPeminjamanController::class, 'store'])->name('detail.store');
    Route::delete('/detail-peminjaman/{id}', [DetailPeminjamanController::class, 'destroy'])->name('detail.destroy');

    // Aksi pengembalian
    Route::post('/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');
});
