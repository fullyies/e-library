@extends('layout.app')

@section('content')

<h2>Data Peminjaman</h2>

<a href="{{ route('peminjaman.create') }}">
    Tambah Peminjaman
</a>

<br><br>

<table border="1" cellpadding="10">

    <tr>
        <th>No</th>
        <th>Tanggal</th>
        <th>Nama Anggota</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

@foreach($peminjaman as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $item->tanggal_pinjam }}</td>

<td>{{ $item->user->name }}</td>

<td>{{ $item->status }}</td>

<td>

<a href="#">
Detail
</a>

</td>

</tr>

@endforeach

</table>

@endsection