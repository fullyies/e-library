

@extends('layout.app')

@section('content')
@if(session('success'))
    <p style="color: green;">
        {{ session('success') }}
    </p>
@endif
<h2>Data Buku</h2>

@if(Auth::user()->role == 'admin')
    <a href="{{ route('buku.create') }}" class="btn btn-primary">
        Tambah Buku
    </a>
@endif

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
       @if(Auth::user()->role == 'admin')
    <th>Aksi</th>
@endif
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

          @if(Auth::user()->role == 'admin')


    <a href="{{ route('buku.edit',$item->id) }}"
        class="btn btn-warning btn-sm">
        Edit
    </a>

    <form action="{{ route('buku.destroy',$item->id) }}"
          method="POST"
          style="display:inline">

        @csrf
        @method('DELETE')

        <button class="btn btn-danger btn-sm">
            Hapus
        </button>

    </form>

</td>
@endif


    </tr>

    @endforeach

</table>
<a href="{{ route('dashboard') }}" class="btn btn-secondary">
    Kembali
</a>
@endsection