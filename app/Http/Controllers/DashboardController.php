<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBuku = Buku::count();
        $totalKategori = Kategori::count();
        $totalAnggota = User::where('role', 'anggota')->count();
        $totalPeminjaman = Peminjaman::count();

        $bukuTerbaru = Buku::with('kategori')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalBuku',
            'totalKategori',
            'totalAnggota',
            'totalPeminjaman',
            'bukuTerbaru'
        ));
    }
}