@extends('layout.app')

@section('content')

<h2>Dashboard</h2>

<hr>

@if(Auth::user()->role == 'admin')

    <a href="{{ route('user.index') }}">
        Data User
    </a>

    <br><br>

    <a href="{{ route('kategori.index') }}">
        Data Kategori
    </a>

    <br><br>

    <a href="{{ route('buku.index') }}">
        Data Buku
    </a>

    <br><br>

    <a href="{{ route('peminjaman.index') }}">
        Data Peminjaman
    </a>

@else

    <a href="{{ route('buku.index') }}">
        Lihat Buku
    </a>

@endif

@endsection