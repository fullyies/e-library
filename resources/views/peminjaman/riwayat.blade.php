@extends('layout.app')

@section('content')

<h2>Riwayat Peminjaman</h2>

<a href="{{ route('dashboard') }}" class="btn btn-secondary">
    Kembali
</a>

<hr>

@if($peminjaman->isEmpty())

    <p>Belum ada riwayat peminjaman.</p>

@else

    @foreach($peminjaman as $pinjam)

        <div style="border:1px solid #ccc;padding:20px;margin-bottom:20px;">

            <h4>{{ $pinjam->kode_pinjam }}</h4>

            <p>
                <b>Tanggal Pinjam :</b>
                {{ $pinjam->tanggal_pinjam }}
            </p>

            <p>
                <b>Tanggal Kembali :</b>
                {{ $pinjam->tanggal_kembali }}
            </p>

            <p>
                <b>Status :</b>

                {{ $pinjam->status }}
            </p>

            <hr>

            <table border="1" cellpadding="8" width="100%">

                <tr>

                    <th>No</th>

                    <th>Judul Buku</th>

                    <th>Jumlah</th>

                </tr>

                @foreach($pinjam->detailPeminjaman as $detail)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $detail->buku->judul }}</td>

                    <td>{{ $detail->jumlah }}</td>

                </tr>

                @endforeach

            </table>

        </div>

    @endforeach

@endif

@endsection