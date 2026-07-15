
@extends('layout.main')

@section('content')

<div class="container">

<h3>Tambah Peminjaman</h3>

<form action="{{ route('peminjaman.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Kode Pinjam</label>

<input type="text"
name="kode_pinjam"
class="form-control"
value="{{ $kode_pinjam }}"
readonly>

</div>

<div class="mb-3">

<label>Anggota</label>

<select name="user_id" class="form-control">

<option value="">-- Pilih Anggota --</option>

@foreach($users as $user)

<option value="{{ $user->id }}">

{{ $user->name }}

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Tanggal Pinjam</label>

<input type="date"
name="tanggal_pinjam"
class="form-control">

</div>

<div class="mb-3">

<label>Tanggal Kembali</label>

<input type="date"
name="tanggal_kembali"
class="form-control">

</div>

<hr>

<h5>Daftar Buku</h5>

<table class="table table-bordered">

<thead>

<tr>

<th>Buku</th>

<th>Jumlah</th>

</tr>

</thead>

<tbody>

<tr>

<td>

<select name="buku_id[]" class="form-control">

@foreach($bukus as $buku)

<option value="{{ $buku->id }}">

{{ $buku->judul }}

</option>

@endforeach

</select>

</td>

<td>

<input type="number"
name="jumlah[]"
class="form-control"
value="1"
min="1">

</td>

</tr>

</tbody>

</table>

<button class="btn btn-success">

Simpan

</button>

<a href="{{ route('peminjaman.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

@endsection