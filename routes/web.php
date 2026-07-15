<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;
// use App\Http\Controllers\PeminjamanController;

Route::get('/', function () {
    return redirect('/login');
});

// Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route setelah login
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');

});

// Route Admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('kategori', KategoriController::class);

    Route::resource('buku', BukuController::class);

    // Aktifkan jika controller sudah ada
    // Route::resource('peminjaman', PeminjamanController::class);

});