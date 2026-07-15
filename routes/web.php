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

<<<<<<< HEAD
=======
Route::get('/', function () {
    return redirect('/login');
});

>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e
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
<<<<<<< HEAD
=======

>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

<<<<<<< HEAD
    // Riwayat peminjaman anggota
    Route::get('/riwayat', [PeminjamanController::class,'riwayat'])->name('riwayat');
=======
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

>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e
});

/*
|--------------------------------------------------------------------------
| Route khusus Admin
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','admin'])->group(function () {
    Route::resource('user', UserController::class);
<<<<<<< HEAD
    Route::resource('kategori', KategoriController::class);

    // Admin bisa CRUD buku (selain index & show)
    Route::resource('buku', BukuController::class)->except(['index','show']);
=======

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
>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e

    // CRUD peminjaman
    Route::resource('peminjaman', PeminjamanController::class);

    // Detail peminjaman (tambah/hapus buku)
    Route::post('/detail-peminjaman', [DetailPeminjamanController::class, 'store'])->name('detail.store');
    Route::delete('/detail-peminjaman/{id}', [DetailPeminjamanController::class, 'destroy'])->name('detail.destroy');

    // Aksi pengembalian
    Route::post('/peminjaman/{id}/kembali', [PeminjamanController::class, 'kembali'])->name('peminjaman.kembali');
});

<<<<<<< HEAD
/*
|--------------------------------------------------------------------------
| Route buku yang boleh diakses semua user login (anggota & admin)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::resource('buku', BukuController::class)
        ->only(['index','show'])
        ->where(['buku' => '[0-9]+']);
});
=======
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
>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e
