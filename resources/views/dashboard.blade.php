@extends('layout.app')

@section('content')

<div class="container-fluid py-4">

    <!-- Judul -->
    <div class="mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <p class="text-muted">
            Selamat Datang di Sistem Informasi E-Library
        </p>
    </div>

    <!-- Card Statistik -->
    <div class="row">

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-primary bg-opacity-10 text-primary d-flex align-items-center justify-content-center me-3"
                        style="width: 56px; height: 56px;">
                        <i class="fas fa-book fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Total Buku</h6>
                        <h3 class="fw-bold mb-0">{{ $totalBuku }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-success bg-opacity-10 text-success d-flex align-items-center justify-content-center me-3"
                        style="width: 56px; height: 56px;">
                        <i class="fas fa-layer-group fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Kategori</h6>
                        <h3 class="fw-bold mb-0">{{ $totalKategori }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-warning bg-opacity-10 text-warning d-flex align-items-center justify-content-center me-3"
                        style="width: 56px; height: 56px;">
                        <i class="fas fa-right-left fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Peminjaman</h6>
                        <h3 class="fw-bold mb-0">{{ $totalPeminjaman }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 mb-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="rounded-circle bg-info bg-opacity-10 text-info d-flex align-items-center justify-content-center me-3"
                        style="width: 56px; height: 56px;">
                        <i class="fas fa-users fa-lg"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">Anggota</h6>
                        <h3 class="fw-bold mb-0">{{ $totalAnggota }}</h3>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Tabel Buku -->
    <div class="card shadow-sm border-0">

        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="fas fa-clock-rotate-left me-1"></i>
                Buku Terbaru
            </h5>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover table-bordered align-middle mb-0">

                    <thead class="table-light">

                        <tr>
                            <th>No</th>
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($bukuTerbaru as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->judul }}</td>
                            <td>{{ $item->penulis }}</td>
                            <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                            <td>
                                <span class="badge bg-success">
                                    {{ $item->stok }}
                                </span>
                            </td>
                        </tr>

                        @empty

                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                Belum ada data buku
                            </td>
                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection