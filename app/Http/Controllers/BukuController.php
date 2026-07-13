<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $bukus = Buku::with('kategori')->get();

        return view('buku.index', compact('bukus'));
    }

    public function create()
{
    $kategoris = Kategori::all();

    $lastBook = Buku::latest()->first();

    if ($lastBook) {
        $number = (int) substr($lastBook->kode_buku, 2);
        $kode_buku = 'BK' . str_pad($number + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $kode_buku = 'BK001';
    }

    return view('buku.create', compact('kategoris', 'kode_buku'));
}

    public function store(Request $request)
    {
        Buku::create([
            'kategori_id'   => $request->kategori_id,
            'kode_buku'     => $request->kode_buku,
            'judul'         => $request->judul,
            'penulis'       => $request->penulis,
            'penerbit'      => $request->penerbit,
            'tahun_terbit'  => $request->tahun_terbit,
            'stok'          => $request->stok,
        ]);

        return redirect()->route('buku.index');
    }

    public function edit(string $id)
    {
        $buku = Buku::findOrFail($id);
        $kategoris = Kategori::all();

        return view('buku.edit', compact('buku','kategoris'));
    }

    public function update(Request $request, string $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->update([
            'kategori_id'   => $request->kategori_id,
            'kode_buku'     => $request->kode_buku,
            'judul'         => $request->judul,
            'penulis'       => $request->penulis,
            'penerbit'      => $request->penerbit,
            'tahun_terbit'  => $request->tahun_terbit,
            'stok'          => $request->stok,
        ]);

        return redirect()->route('buku.index');
    }

    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect()->route('buku.index');
    }
}