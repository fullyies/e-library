@extends('layout.app')

@section('content')

<div class="container">

<h3>Edit Peminjaman</h3>

<form action="{{ route('peminjaman.update',$peminjaman->id) }}"
method="POST">

@csrf

@method('PUT')

<div class="mb-3">

<label>Status</label>

<select name="status" class="form-control">

<option value="Dipinjam"
{{ $peminjaman->status=='Dipinjam'?'selected':'' }}>
Dipinjam
</option>

<option value="Dikembalikan"
{{ $peminjaman->status=='Dikembalikan'?'selected':'' }}>
Dikembalikan
</option>

<option value="Terlambat"
{{ $peminjaman->status=='Terlambat'?'selected':'' }}>
Terlambat
</option>

</select>

</div>

<button class="btn btn-primary">

Update

</button>

<a href="{{ route('peminjaman.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

<hr>

<form action="{{ route('peminjaman.destroy',$peminjaman->id) }}"
method="POST">

@csrf

@method('DELETE')

<button
class="btn btn-danger"
onclick="return confirm('Yakin ingin menghapus data ini?')">

Hapus

</button>

</form>

</div>

@endsection