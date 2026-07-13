@extends('layout.app')

@section('content')

<h2>Tambah Buku</h2>
@if($errors->any())

    <ul style="color:red">

        @foreach($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

@endif
<form action="{{ route('buku.store') }}" method="POST">

    @csrf

    <table>

        <tr>
            <td>Kode Buku</td>
            <td>
                <input type="text"
                       name="kode_buku"
                       value="{{ $kode_buku }}"
                       readonly>
            </td>
        </tr>

        <tr>
            <td>Judul Buku</td>
            <td>
                <input type="text"
                       name="judul">
            </td>
        </tr>

        <tr>
            <td>Kategori</td>

            <td>

                <select name="kategori_id">

                    @foreach($kategoris as $kategori)

                    <option value="{{ $kategori->id }}">

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
                       name="penulis">
            </td>
        </tr>

        <tr>
            <td>Penerbit</td>
            <td>
                <input type="text"
                       name="penerbit">
            </td>
        </tr>

        <tr>
            <td>Tahun Terbit</td>
            <td>
                <input type="number"
                       name="tahun_terbit">
            </td>
        </tr>

        <tr>
            <td>Stok</td>
            <td>
                <input type="number"
                       name="stok">
            </td>
        </tr>

        <tr>

            <td></td>

            <td>

                <button type="submit">

                    Simpan

                </button>

                <a href="{{ route('buku.index') }}">

                    Kembali

                </a>

            </td>

        </tr>

    </table>

</form>

@endsection