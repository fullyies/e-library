@extends('layout.app')

@section('content')

<h2>Tambah Kategori</h2>

<form action="{{ route('kategori.store') }}"
      method="POST">

    @csrf

    <table>

        <tr>

            <td>Nama Kategori</td>

            <td>

                <input type="text"
                       name="nama_kategori">

            </td>

        </tr>

        <tr>

            <td></td>

            <td>

                <button type="submit">

                    Simpan

                </button>

                <a href="{{ route('kategori.index') }}">

                    Kembali

                </a>

            </td>

        </tr>

    </table>

</form>

@endsection