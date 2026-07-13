@extends('layout.app')

@section('content')

<h2>Edit Buku</h2>

<form action="{{ route('buku.update',$buku->id) }}" method="POST">

    @csrf
    @method('PUT')

    <table>

        <tr>
            <td>Kode Buku</td>
            <td>
                <input type="text"
                       name="kode_buku"
                       value="{{ $buku->kode_buku }}"
                       readonly>
            </td>
        </tr>

        <tr>
            <td>Judul Buku</td>
            <td>
                <input type="text"
                       name="judul"
                       value="{{ $buku->judul }}">
            </td>
        </tr>

        <tr>

            <td>Kategori</td>

            <td>

                <select name="kategori_id">

                    @foreach($kategoris as $kategori)

                    <option value="{{ $kategori->id }}"
                        {{ $kategori->id == $buku->kategori_id ? 'selected' : '' }}>

                        {{ $kategori->nama_kategori }}

                    </option>

                    @endforeach

                </select>

            </td>

        </tr>

        <tr>
            <td>Penulis</td>
            <td>
                <input type="text"
                       name="penulis"
                       value="{{ $buku->penulis }}">
            </td>
        </tr>

        <tr>
            <td>Penerbit</td>
            <td>
                <input type="text"
                       name="penerbit"
                       value="{{ $buku->penerbit }}">
            </td>
        </tr>

        <tr>
            <td>Tahun Terbit</td>
            <td>
                <input type="number"
                       name="tahun_terbit"
                       value="{{ $buku->tahun_terbit }}">
            </td>
        </tr>

        <tr>
            <td>Stok</td>
            <td>
                <input type="number"
                       name="stok"
                       value="{{ $buku->stok }}">
            </td>
        </tr>

        <tr>

            <td></td>

            <td>

                <button type="submit">

                    Update

                </button>

                <a href="{{ route('buku.index') }}">

                    Kembali

                </a>

            </td>

        </tr>

    </table>

</form>

@endsection