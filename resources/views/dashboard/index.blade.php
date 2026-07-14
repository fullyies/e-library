@extends('layout.app')

@section('content')

<h2>Dashboard</h2>

<h4>
Selamat Datang,
{{ Auth::user()->name }}
</h4>

<hr>

@if(Auth::user()->role == 'admin')

    <h3>Dashboard Admin</h3>

    <table border="1" cellpadding="10">

        <tr>
            <td>Total Buku</td>
            <td>{{ $totalBuku }}</td>
        </tr>

        <tr>
            <td>Total Kategori</td>
            <td>{{ $totalKategori }}</td>
        </tr>

        <tr>
            <td>Total Anggota</td>
            <td>{{ $totalAnggota }}</td>
        </tr>

        <tr>
            <td>Total Peminjaman</td>
            <td>{{ $totalPeminjaman }}</td>
        </tr>

    </table>

@endif


@if(Auth::user()->role == 'anggota')

    <h3>Dashboard Anggota</h3>

    <p>Total Buku :</p>

    <h2>{{ $totalBuku }}</h2>

@endif

@endsection