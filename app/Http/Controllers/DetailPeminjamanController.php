<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
use Illuminate\Http\Request;

class DetailPeminjamanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'peminjaman_id' => 'required',
            'buku_id' => 'required',
            'jumlah' => 'required|integer|min:1'
        ]);

        $buku = Buku::findOrFail($request->buku_id);

        // Cek stok
        if ($request->jumlah > $buku->stok) {
            return back()->with('error', 'Stok buku tidak mencukupi.');
        }

       // Cek apakah buku sudah ada di transaksi ini
$detail = DetailPeminjaman::where('peminjaman_id', $request->peminjaman_id)
            ->where('buku_id', $request->buku_id)
            ->first();

if ($detail) {

    // Tambahkan jumlah jika buku sudah ada
    $detail->jumlah += $request->jumlah;
    $detail->save();

} else {

    // Simpan sebagai detail baru
    DetailPeminjaman::create([
        'peminjaman_id' => $request->peminjaman_id,
        'buku_id' => $request->buku_id,
        'jumlah' => $request->jumlah,
        ]);

        // Kurangi stok
        $buku->stok -= $request->jumlah;
        $buku->save();

        return back()->with('success', 'Buku berhasil ditambahkan.');
    }
}

    public function destroy(string $id)
{
    $detail = DetailPeminjaman::findOrFail($id);

    $buku = Buku::findOrFail($detail->buku_id);

    // Kembalikan stok
    $buku->stok += $detail->jumlah;
    $buku->save();

    $detail->delete();

    return back()->with('success', 'Data berhasil dihapus.');
}
}
