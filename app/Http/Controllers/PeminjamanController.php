<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\DetailPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //db transaction

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $peminjaman = Peminjaman::with('user')
                    ->latest()
                    ->get();

    return view('peminjaman.index', compact('peminjaman'));
}

    /**
     * Show the form for creating a new resource.
     */
   public function create()
{
    $anggota = User::where('role','anggota')->get();

    $buku = Buku::all();

    return view('peminjaman.create', compact(
        'anggota',
        'buku'
    ));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required',
        'tanggal_pinjam' => 'required',
        'tanggal_kembali' => 'required'
    ]);

    // Generate kode peminjaman otomatis
    $last = Peminjaman::latest()->first();

    if ($last) {
        $nomor = (int) substr($last->kode_pinjam, 3) + 1;
    } else {
        $nomor = 1;
    }

    $kode = 'PJM' . str_pad($nomor, 3, '0', STR_PAD_LEFT);

    $peminjaman = Peminjaman::create([
        'kode_pinjam' => $kode,
        'user_id' => $request->user_id,
        'tanggal_pinjam' => $request->tanggal_pinjam,
        'tanggal_kembali' => $request->tanggal_kembali,
        'status' => 'Dipinjam'
    ]);

    return redirect()->route('peminjaman.show', $peminjaman->id);
}

    /**
     * Display the specified resource.
     */

public function show(string $id)
{
    $peminjaman = Peminjaman::with('user')->findOrFail($id);

    $detail = DetailPeminjaman::with('buku')
                ->where('peminjaman_id', $id)
                ->get();

    $buku = Buku::where('stok', '>', 0)->get();

    // Hitung total buku yang dipinjam
    $total = DetailPeminjaman::where('peminjaman_id', $id)
                ->sum('jumlah');

    return view('peminjaman.show', compact(
        'peminjaman',
        'detail',
        'buku',
        'total'
    ));
}

//ini tanpa db transaction, jika ada error di tengah proses, stok buku akan tetap berkurang
/*public function kembali($id)
{
    // Ambil transaksi
    $peminjaman = Peminjaman::findOrFail($id);

    // Cek apakah sudah dikembalikan
    if ($peminjaman->status == 'Dikembalikan') {

        return redirect()
                ->back()
                ->with('error','Buku sudah dikembalikan.');

    }

    // Ambil semua detail buku
    $detail = DetailPeminjaman::where(
        'peminjaman_id',
        $id
    )->get();

    // Kembalikan stok
    foreach($detail as $item){

        $buku = Buku::find($item->buku_id);

        $buku->stok += $item->jumlah;

        $buku->save();

    }

    // Ubah status transaksi
    $peminjaman->status = 'Dikembalikan';

    $peminjaman->save();

    return redirect()
            ->route('peminjaman.index')
            ->with(
                'success',
                'Peminjaman berhasil dikembalikan.'
            );
} */

//ini dengan db transaction
public function kembali($id)
{
    DB::transaction(function () use ($id) {

        $peminjaman = Peminjaman::findOrFail($id);

        $detail = DetailPeminjaman::where(
            'peminjaman_id',
            $id
        )->get();

        foreach ($detail as $item) {

            $buku = Buku::find($item->buku_id);

            $buku->stok += $item->jumlah;

            $buku->save();

        }

        $peminjaman->status = 'Dikembalikan';

        $peminjaman->save();

    });

    return redirect()
            ->route('peminjaman.index')
            ->with('success','Buku berhasil dikembalikan.');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
