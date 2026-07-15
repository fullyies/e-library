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

    </div>

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
                            <th>Nama Peminjam</th>
                            <th>Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td colspan="7" class="text-center text-muted">

                                Belum ada data peminjaman.

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection