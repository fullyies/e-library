@extends('layout.app')

@section('content')

<h2>Edit Kategori</h2>

<form action="{{ route('kategori.update',$kategori->id) }}"
      method="POST">

    @csrf

    @method('PUT')

    <table>

        <tr>

            <td>Nama Kategori</td>

            <td>

                <input type="text"
                       name="nama_kategori"
                       value="{{ $kategori->nama_kategori }}">

            </td>

        </tr>

        <tr>

            <td></td>

            <td>

                <button type="submit">

                    Update

                </button>

                <a href="{{ route('kategori.index') }}">

                    Kembali

                </a>

            </td>

        </tr>

    </table>

</form>

@endsection