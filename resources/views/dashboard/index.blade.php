@extends('layout.app')

@section('content')

<div class="container-fluid">

    <h1 class="fw-bold mb-2">Dashboard</h1>

    <p class="text-muted mb-4">
        Selamat Datang di Sistem Informasi E-Library
    </p>

    <div class="row">

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">

                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                        <i class="fas fa-book fa-2x text-primary"></i>
                    </div>

                    <div>
                        <small class="text-muted">Total Buku</small>
                        <h2 class="mb-0">{{ $totalBuku }}</h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">

                    <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                        <i class="fas fa-layer-group fa-2x text-success"></i>
                    </div>

                    <div>
                        <small class="text-muted">Kategori</small>
                        <h2 class="mb-0">{{ $totalKategori }}</h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">

                    <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                        <i class="fas fa-exchange-alt fa-2x text-warning"></i>
                    </div>

                    <div>
                        <small class="text-muted">Peminjaman</small>
                        <h2 class="mb-0">{{ $totalPeminjaman }}</h2>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center">

                    <div class="rounded-circle bg-info bg-opacity-10 p-3 me-3">
                        <i class="fas fa-users fa-2x text-info"></i>
                    </div>

                    <div>
                        <small class="text-muted">Anggota</small>
                        <h2 class="mb-0">{{ $totalAnggota }}</h2>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="card shadow-sm">

        <div class="card-header bg-primary text-white">
            <i class="fas fa-history"></i>
            Buku Terbaru
        </div>

        <div class="card-body">

            <table class="table table-bordered table-hover">

                <thead>

                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                    </tr>

                </thead>

                <tbody>

                @forelse($bukuTerbaru as $buku)

                    <tr>

                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $buku->judul }}</td>
                        <td>{{ $buku->penulis }}</td>
                        <td>{{ $buku->kategori->nama_kategori }}</td>

                        <td>
                            <span class="badge bg-success">
                                {{ $buku->stok }}
                            </span>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="5" class="text-center">
                            Belum ada data buku.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection