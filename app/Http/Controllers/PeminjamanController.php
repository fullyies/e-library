<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = Peminjaman::with([
            'user',
            'detailPeminjaman.buku'
        ])->get();

        return view('peminjaman.index', compact('peminjamans'));
    }


    public function create()
    {
        $users = User::where('role', 'anggota')->get();

        $bukus = Buku::where('stok', '>', 0)->get();


        $last = Peminjaman::latest()->first();


        if (!$last) {

            $kode_pinjam = 'PJ001';

        } else {

            $angka = (int) substr($last->kode_pinjam, 2);

            $kode_pinjam = 'PJ' . sprintf('%03d', $angka + 1);

        }


        return view('peminjaman.create', compact(
            'users',
            'bukus',
            'kode_pinjam'
        ));
    }



    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {


            $peminjaman = Peminjaman::create([

                'kode_pinjam' => $request->kode_pinjam,

                'user_id' => $request->user_id,

                'tanggal_pinjam' => $request->tanggal_pinjam,

                'tanggal_kembali' => $request->tanggal_kembali,

                'status' => 'Dipinjam'

            ]);



            foreach ($request->buku_id as $i => $buku_id) {


                DetailPeminjaman::create([

                    'peminjaman_id' => $peminjaman->id,

                    'buku_id' => $buku_id,

                    'jumlah' => $request->jumlah[$i]

                ]);



                $buku = Buku::findOrFail($buku_id);


                $buku->stok -= $request->jumlah[$i];


                $buku->save();

            }


        });


        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil disimpan');

    }




    public function edit(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);


        return view('peminjaman.edit', compact('peminjaman'));
    }





    public function update(Request $request, string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);



        $peminjaman->update([

            'status' => $request->status

        ]);



        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Status peminjaman berhasil diperbarui');

    }





    public function destroy(string $id)
    {

        DB::transaction(function () use ($id) {


            $peminjaman = Peminjaman::with('detailPeminjaman')
                ->findOrFail($id);



            foreach ($peminjaman->detailPeminjaman as $detail) {


                $buku = Buku::find($detail->buku_id);



                if ($buku) {


                    $buku->stok += $detail->jumlah;


                    $buku->save();


                }

            }



            $peminjaman->delete();


        });



        return redirect()
            ->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil dihapus');

    }
}