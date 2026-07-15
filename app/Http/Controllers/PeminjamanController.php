<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Peminjaman;
use App\Models\User;
use App\Models\DetailPeminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PeminjamanController extends Controller
{

    public function index()
    {
        $peminjaman = Peminjaman::with('user')
                        ->latest()
                        ->get();

        return view('peminjaman.index', compact('peminjaman'));
    }


    /**
     * Form tambah peminjaman
     */
    public function create()
    {
        $users = User::where('role','anggota')->get();

        $bukus = Buku::all();


        $last = Peminjaman::latest()->first();

        $nomor = $last 
            ? (int) substr($last->kode_pinjam, 3) + 1 
            : 1;


        $kode_pinjam = 'PJM' . str_pad($nomor, 3, '0', STR_PAD_LEFT);


        return view('peminjaman.create', compact(
            'users',
            'bukus',
            'kode_pinjam'
        ));
    }



    /**
     * Simpan peminjaman
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required'
        ]);


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



        return redirect()
            ->route('peminjaman.show', $peminjaman->id);

    }




    /**
     * Detail peminjaman
     */
    public function show(string $id)
    {

        $peminjaman = Peminjaman::with('user')
                        ->findOrFail($id);



        $detail = DetailPeminjaman::with('buku')
                    ->where('peminjaman_id', $id)
                    ->get();



        $buku = Buku::where('stok','>',0)->get();



        $total = DetailPeminjaman::where(
            'peminjaman_id',
            $id
        )->sum('jumlah');



        return view('peminjaman.show', compact(
            'peminjaman',
            'detail',
            'buku',
            'total'
        ));

    }




    /**
     * Pengembalian buku dengan transaction
     */
    public function kembali($id)
    {

        DB::transaction(function () use ($id) {


            $peminjaman = Peminjaman::findOrFail($id);



            $detail = DetailPeminjaman::where(
                'peminjaman_id',
                $id
            )->get();



            foreach($detail as $item){


                $buku = Buku::find($item->buku_id);



                if($buku){

                    $buku->stok += $item->jumlah;

                    $buku->save();

                }


            }



            $peminjaman->status = 'Dikembalikan';

            $peminjaman->save();



        });



        return redirect()
            ->route('peminjaman.index')
            ->with(
                'success',
                'Buku berhasil dikembalikan.'
            );

    }





    /**
     * Form edit peminjaman
     */
    public function edit(string $id)
    {

        $peminjaman = Peminjaman::findOrFail($id);


        // Ditambahkan supaya edit.blade.php tidak error
        $bukus = Buku::all();



        return view('peminjaman.edit', compact(
            'peminjaman',
            'bukus'
        ));

    }





    /**
     * Update peminjaman
     */
    public function update(Request $request, string $id)
    {

        $peminjaman = Peminjaman::findOrFail($id);



        $peminjaman->update([

            'status' => $request->status

        ]);



        return redirect()
            ->route('peminjaman.index')
            ->with(
                'success',
                'Status peminjaman berhasil diperbarui'
            );

    }





    /**
     * Hapus peminjaman
     */
    public function destroy(string $id)
    {

        DB::transaction(function () use ($id) {



            $peminjaman = Peminjaman::with('detailPeminjaman')
                            ->findOrFail($id);



            foreach($peminjaman->detailPeminjaman as $detail){


                $buku = Buku::find($detail->buku_id);



                if($buku){


                    $buku->stok += $detail->jumlah;


                    $buku->save();

                }


            }



            $peminjaman->delete();



        });



        return redirect()
            ->route('peminjaman.index')
            ->with(
                'success',
                'Data peminjaman berhasil dihapus'
            );

    }





    /**
     * Riwayat anggota
     */
    public function riwayat()
    {

        $peminjaman = Peminjaman::with([
            'detailPeminjaman.buku'
        ])
        ->where('user_id', Auth::id())
        ->latest()
        ->get();



        return view(
            'peminjaman.riwayat',
            compact('peminjaman')
        );

    }


}