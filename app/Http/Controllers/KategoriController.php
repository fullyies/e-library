<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{

    public function index()
    {
        return view('kategori.index'); // sesuai folder resources/views/kategori/index.blade.php
    }
    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori'=>'required|max:100'
        ]);

        Kategori::create([
            'nama_kategori'=>$request->nama_kategori
        ]);

        return redirect()->route('kategori.index')
                ->with('success','Kategori berhasil ditambahkan');
    }

    public function edit(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kategori'=>'required|max:100'
        ]);

        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama_kategori'=>$request->nama_kategori
        ]);

        return redirect()->route('kategori.index')
                ->with('success','Kategori berhasil diubah');
    }

    public function destroy(string $id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->delete();

        return redirect()->route('kategori.index')
                ->with('success','Kategori berhasil dihapus');
    }
}