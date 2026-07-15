<<<<<<< HEAD
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Form Tambah Peminjaman</h5>
=======
@extends('layout.app')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2 class="fw-bold">
            <i class="fas fa-exchange-alt"></i>
            Data Peminjaman
        </h2>

        <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i>
            Tambah Peminjaman
        </a>

>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e
    </div>
    <div class="card-body">
        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

<<<<<<< HEAD
            <div class="mb-3">
                <label class="form-label">Kode Pinjam</label>
                <input type="text" name="kode_pinjam" class="form-control"
                       value="{{ $kode_pinjam }}" readonly>
=======
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Daftar Peminjaman</h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>Kode Pinjam</th>
                            <th>Nama Peminjam</th>
                            <th>Buku</th>
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

                            <td>{{ $item->buku->judul ?? '-' }}</td>

                            <td>{{ $item->tanggal_pinjam }}</td>

                            <td>{{ $item->tanggal_kembali }}</td>

                            <td>
                                @if($item->status == 'Dipinjam')
                                    <span class="badge bg-warning text-dark">{{ $item->status }}</span>
                                @elseif($item->status == 'Dikembalikan')
                                    <span class="badge bg-success">{{ $item->status }}</span>
                                @else
                                    <span class="badge bg-danger">{{ $item->status }}</span>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('peminjaman.show',$item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i>
                                    Detail
                                </a>

                                <a href="{{ route('peminjaman.edit',$item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                    Edit
                                </a>

                                @if($item->status == 'Dipinjam')
                                    <form action="{{ route('peminjaman.kembali',$item->id) }}"
                                        method="POST"
                                        class="d-inline">

                                        @csrf

                                        <button type="submit"
                                            class="btn btn-success btn-sm"
                                            onclick="return confirm('Yakin buku dikembalikan?')">
                                            <i class="fas fa-check"></i>
                                            Kembalikan
                                        </button>

                                    </form>
                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>
                            <td colspan="8" class="text-center text-muted py-3">
                                Belum ada data peminjaman.
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e
            </div>

            <div class="mb-3">
                <label class="form-label">Anggota</label>
                <select name="user_id" class="form-select">
                    <option value="">-- Pilih Anggota --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Simpan
            </button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </form>
    </div>
</div>
<<<<<<< HEAD
=======

@endsection
>>>>>>> 6d08c318106ff09117e53b1f0b1a899eddcc146e
