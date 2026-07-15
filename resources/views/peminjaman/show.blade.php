@extends('layout.app')

@section('content')

<h2>Detail Peminjaman</h2>

<hr>

<table cellpadding="5">

    <tr>
        <td><strong>Kode Pinjam</strong></td>
        <td>: {{ $peminjaman->kode_pinjam }}</td>
    </tr>

    <tr>
        <td><strong>Nama Anggota</strong></td>
        <td>: {{ $peminjaman->user->name }}</td>
    </tr>

    <tr>
        <td><strong>Tanggal Pinjam</strong></td>
        <td>: {{ $peminjaman->tanggal_pinjam }}</td>
    </tr>

    <tr>
        <td><strong>Tanggal Kembali</strong></td>
        <td>: {{ $peminjaman->tanggal_kembali }}</td>
    </tr>

    <tr>
        <td><strong>Status</strong></td>
        <td>: {{ $peminjaman->status }}</td>
    </tr>

    <tr>
        <td><strong>Total Buku</strong></td>
        <td>: {{ $total }} Eksemplar</td>
    </tr>

</table>

<hr>

@if(session('success'))

<div>

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div>

    {{ session('error') }}

</div>

@endif

@if($peminjaman->status == 'Dipinjam')
    <h3>Tambah Buku</h3>
    <form action="{{ route('detail.store') }}" method="POST">
        @csrf
        <input type="hidden" name="peminjaman_id" value="{{ $peminjaman->id }}">
        <table>
            <tr>
                <td>Buku</td>
                <td>
                    <select name="buku_id">
                        @foreach($buku as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->judul }} (Stok : {{ $item->stok }})
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td><input type="number" name="jumlah" min="1"></td>
            </tr>
        </table>
        <br>
        <button>Tambah Buku</button>
    </form>
@endif

<hr>

<h3>Daftar Buku</h3>

<table border="1" cellpadding="10">

    <tr>

        <th>No</th>

        <th>Buku</th>

        <th>Jumlah</th>

        <th>Aksi</th>

    </tr>

    @foreach($detail as $item)

    <tr>

    <td>{{ $loop->iteration }}</td>

    <td>{{ $item->buku->judul }}</td>

    <td>{{ $item->jumlah }}</td>

    <td>
        <form action="{{ route('detail.destroy',$item->id) }}" method="POST">

            @csrf
            @method('DELETE')

            <button type="submit"
                onclick="return confirm('Hapus buku ini?')">

                Hapus

            </button>

        </form>
    </td>

</tr>

    @endforeach

</table>
<a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
    Kembali
</a>
@endsection