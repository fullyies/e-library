@extends('layout.main')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Peminjaman</h3>
        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
            Tambah Peminjaman
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode Pinjam</th>
                <th>Anggota</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th width="200">Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($peminjaman as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_pinjam }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>
                    @if($item->status=='Dipinjam')
                        <span class="text-warning">{{ $item->status }}</span>
                    @elseif($item->status=='Dikembalikan')
                        <span class="text-success">{{ $item->status }}</span>
                    @else
                        <span class="text-danger">{{ $item->status }}</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('peminjaman.show',$item->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('peminjaman.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    @if($item->status=='Dipinjam')
                        <form action="{{ route('peminjaman.kembali',$item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm"
                                onclick="return confirm('Yakin buku dikembalikan?')">
                                Kembalikan
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center">Belum ada data peminjaman.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection
