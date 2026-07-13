@extends('layouts.app')

@section('content')

<h2>Data Buku</h2>

<a href="{{ route('buku.create') }}">
    Tambah Buku
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Penulis</th>
        <th>Penerbit</th>
        <th>Tahun</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    @foreach($bukus as $item)

    <tr>

        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->kode_buku }}</td>
        <td>{{ $item->judul }}</td>
        <td>{{ $item->kategori->nama_kategori }}</td>
        <td>{{ $item->penulis }}</td>
        <td>{{ $item->penerbit }}</td>
        <td>{{ $item->tahun_terbit }}</td>
        <td>{{ $item->stok }}</td>

        <td>

            <a href="{{ route('buku.edit',$item->id) }}">
                Edit
            </a>

            |

            <form action="{{ route('buku.destroy',$item->id) }}"
                  method="POST"
                  style="display:inline">

                @csrf
                @method('DELETE')

                <button onclick="return confirm('Hapus buku ini?')">
                    Hapus
                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

@endsection