@extends('layout.app')

@section('content')

<h2>Data Peminjaman</h2>

<a href="{{ route('peminjaman.create') }}">
    Tambah Peminjaman
</a>

<br><br>

@if(session('success'))

<div>

    {{ session('success') }}

</div>

@endif

@if(session('error'))

<div>

    {{ session('error') }}

</div>

@endif

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

        <td>

            @if($item->status=='Dipinjam')

            <span style="color:orange">

                {{ $item->status }}

            </span>

            @elseif($item->status=='Dikembalikan')

            <span style="color:green">

                {{ $item->status }}

            </span>

            @else

            <span style="color:red">

                {{ $item->status }}

            </span>

            @endif

        </td>

        <td>

            <a href="{{ route('peminjaman.show',$item->id) }}">

                Detail

            </a>

            @if($item->status=='Dipinjam')

            <form
                action="{{ route('peminjaman.kembali',$item->id) }}"
                method="POST"
                style="display:inline;">

                @csrf

                <button
                    type="submit"
                    onclick="return confirm('Yakin buku dikembalikan?')">

                    Kembalikan

                </button>

            </form>

            @endif

        </td>

        </td>

    </tr>

    @endforeach

</table>

@endsection