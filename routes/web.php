<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login']);
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::resource('kategori',KategoriController::class);
Route::resource('buku',BukuController::class);