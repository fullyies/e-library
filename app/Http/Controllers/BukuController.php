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

        $lastBook = Buku::orderBy('id', 'desc')->first();

        if (!$lastBook) {

            $kode_buku = 'BK001';

        } else {

            $angka = (int) substr($lastBook->kode_buku, 2);

            $angka++;

            $kode_buku = 'BK' . sprintf("%03d", $angka);

        }

        return view('buku.create', compact('kategoris', 'kode_buku'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id'   => 'required|exists:kategori,id',
            'kode_buku'     => 'required|string|max:20|unique:buku,kode_buku',
            'judul'         => 'required|string|max:255',
            'penulis'       => 'required|string|max:255',
            'penerbit'      => 'required|string|max:255',
            'tahun_terbit'  => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'stok'          => 'required|integer|min:0',
        ], [
            'kategori_id.required'  => 'Kategori wajib dipilih.',
            'kategori_id.exists'    => 'Kategori tidak valid.',
            'kode_buku.required'    => 'Kode buku wajib diisi.',
            'kode_buku.unique'      => 'Kode buku sudah digunakan.',
            'judul.required'        => 'Judul buku wajib diisi.',
            'penulis.required'      => 'Nama penulis wajib diisi.',
            'penerbit.required'     => 'Nama penerbit wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.digits'   => 'Tahun terbit harus 4 digit angka.',
            'stok.required'         => 'Stok wajib diisi.',
            'stok.min'              => 'Stok tidak boleh kurang dari 0.',
        ]);

        Buku::create($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
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

        $validated = $request->validate([
            'kategori_id'   => 'required|exists:kategori,id',
            'kode_buku'     => 'required|string|max:20|unique:buku,kode_buku,' . $buku->id,
            'judul'         => 'required|string|max:255',
            'penulis'       => 'required|string|max:255',
            'penerbit'      => 'required|string|max:255',
            'tahun_terbit'  => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'stok'          => 'required|integer|min:0',
        ], [
            'kategori_id.required'  => 'Kategori wajib dipilih.',
            'kategori_id.exists'    => 'Kategori tidak valid.',
            'kode_buku.required'    => 'Kode buku wajib diisi.',
            'kode_buku.unique'      => 'Kode buku sudah digunakan.',
            'judul.required'        => 'Judul buku wajib diisi.',
            'penulis.required'      => 'Nama penulis wajib diisi.',
            'penerbit.required'     => 'Nama penerbit wajib diisi.',
            'tahun_terbit.required' => 'Tahun terbit wajib diisi.',
            'tahun_terbit.digits'   => 'Tahun terbit harus 4 digit angka.',
            'stok.required'         => 'Stok wajib diisi.',
            'stok.min'              => 'Stok tidak boleh kurang dari 0.',
        ]);

        $buku->update($validated);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function show(string $id)
    {
        $buku = Buku::with('kategori')->findOrFail($id);
        return view('buku.show', compact('buku'));
    }

    public function destroy(string $id)
    {
        $buku = Buku::findOrFail($id);

        $buku->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}