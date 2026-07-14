@extends('layout.app')

@section('content')

<h2>Tambah Peminjaman</h2>

<form action="{{ route('peminjaman.store') }}" method="POST">

@csrf

<table>

<tr>

<td>Anggota</td>

<td>

<select name="user_id">

@foreach($anggota as $user)

<option value="{{ $user->id }}">

{{ $user->name }}

</option>

@endforeach

</select>

</td>

</tr>

<tr>

<td>Tanggal Pinjam</td>

<td>

<input
type="date"
name="tanggal_pinjam"
value="{{ date('Y-m-d') }}">

</td>

</tr>

<tr>

<td>Tanggal Kembali</td>

<td>

<input
type="date"
name="tanggal_kembali">

</td>

</tr>

</table>

<hr>

<h3>Daftar Buku</h3>

<p>
(Tahap berikutnya kita buat tabel detail peminjaman di sini)
</p>

<button type="submit">

Simpan

</button>

</form>

@endsection