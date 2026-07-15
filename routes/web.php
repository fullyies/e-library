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
});

/*
|--------------------------------------------------------------------------
| Route khusus Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('kategori', KategoriController::class);

    // Admin bisa CRUD buku (selain index & show)
    // WAJIB didaftarkan SEBELUM route index/show milik group auth biasa,
    // supaya /buku/create tidak "kesedot" ke route show ({buku} = "create")
    Route::resource('buku', BukuController::class)->except(['index','show']);

    // CRUD peminjaman
    Route::resource('peminjaman', PeminjamanController::class);

    // Detail peminjaman
    Route::post('/detail-peminjaman', [DetailPeminjamanController::class, 'store'])->name('detail.store');
    Route::delete('/detail-peminjaman/{id}', [DetailPeminjamanController::class, 'destroy'])->name('detail.destroy');

    // Pengembalian buku
    Route::post('/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');
});

/*
|--------------------------------------------------------------------------
| Buku yang bisa dilihat semua user login (anggota & admin)
| Didaftarkan PALING BELAKANG + constraint angka biar aman dari konflik
| dengan route admin (create, edit, dll) di atas
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::resource('buku', BukuController::class)
        ->only(['index','show'])
        ->where(['buku' => '[0-9]+']);
});