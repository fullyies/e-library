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

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

/*
|--------------------------------------------------------------------------
| Route untuk semua user yang sudah login
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    // Anggota & Admin boleh melihat daftar buku
    Route::get('/buku', [BukuController::class, 'index'])
        ->name('buku.index');

    //riwayat peminjaman
    Route::get('/riwayat', [PeminjamanController::class, 'riwayat'])
        ->name('riwayat');

});

/*
|--------------------------------------------------------------------------
| Route khusus Admin
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('user', UserController::class);

    Route::resource('kategori', KategoriController::class);

    // CRUD Buku (selain index & show)
    Route::get('/buku/create', [BukuController::class, 'create'])
        ->name('buku.create');

    Route::post('/buku', [BukuController::class, 'store'])
        ->name('buku.store');

    Route::get('/buku/{buku}/edit', [BukuController::class, 'edit'])
        ->name('buku.edit');

    Route::put('/buku/{buku}', [BukuController::class, 'update'])
        ->name('buku.update');

    Route::delete('/buku/{buku}', [BukuController::class, 'destroy'])
        ->name('buku.destroy');

    Route::resource('peminjaman', PeminjamanController::class);

    Route::post('/detail-peminjaman',
        [DetailPeminjamanController::class, 'store'])
        ->name('detail.store');

    Route::delete('/detail-peminjaman/{id}',
        [DetailPeminjamanController::class, 'destroy'])
        ->name('detail.destroy');

    Route::post('/peminjaman/{id}/kembali',
        [PeminjamanController::class, 'kembali'])
        ->name('peminjaman.kembali');

});

/*
|--------------------------------------------------------------------------
| Route detail buku (WAJIB PALING BAWAH)
|--------------------------------------------------------------------------
| Route wildcard {buku} ini sengaja ditaruh paling akhir supaya tidak
| "menangkap" duluan request ke path spesifik seperti /buku/create
| atau /buku/{buku}/edit. Laravel mencocokkan route dari atas ke bawah,
| jadi semua route /buku/... yang spesifik harus didaftarkan lebih dulu.
*/

Route::middleware('auth')->group(function () {

    Route::get('/buku/{buku}', [BukuController::class, 'show'])
        ->name('buku.show');

});