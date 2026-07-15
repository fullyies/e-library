@extends('layout.app')

@section('content')
@if(session('error'))

<div class="alert alert-danger">
    {{ session('error') }}
</div>

@endif
<h2>Dashboard</h2>

<hr>

@if(Auth::user()->role == 'admin')

    <h4>Menu Admin</h4>

    <a href="{{ route('user.index') }}">Data User</a>

    <br><br>

    <a href="{{ route('kategori.index') }}">Data Kategori</a>

    <br><br>

    <a href="{{ route('buku.index') }}">Data Buku</a>

    <br><br>

    <a href="{{ route('peminjaman.index') }}">Data Peminjaman</a>

@else

    <h4>Selamat Datang {{ Auth::user()->name }}</h4>

    <p>
        Anda login sebagai anggota perpustakaan.
    </p>

    <hr>

    <a href="{{ route('buku.index') }}">
        📚 Lihat Daftar Buku
    </a>

    <br><br>

    <a href="{{ route('riwayat') }}">
    📖 Riwayat Peminjaman
</a>

@endif

@endsection