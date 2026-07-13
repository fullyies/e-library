@extends('layout.app')

@section('content')

<h2>Data Kategori</h2>

<a href="{{ route('kategori.create') }}">
    Tambah Kategori
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>

        <th>No</th>

        <th>Nama Kategori</th>

        <th>Aksi</th>

    </tr>

    @foreach($kategoris as $item)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $item->nama_kategori }}</td>

        <td>

            <a href="{{ route('kategori.edit',$item->id) }}">

                Edit

            </a>

            |

            <form action="{{ route('kategori.destroy',$item->id) }}"
                method="POST"
                style="display:inline">

                @csrf

                @method('DELETE')

                <button onclick="return confirm('Hapus data?')">

                    Hapus

                </button>

            </form>

        </td>

    </tr>

    @endforeach

</table>

@endsection